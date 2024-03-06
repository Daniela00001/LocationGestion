<?php
include 'v_espace_demandeur.php';
include '../C/c_annoncesDemandeur.php';
@session_start();
$demandeur = $_SESSION["demandeur"];

echo '<div id="annonces-container">';

foreach ($annonces as $annonce) {
    echo '<div class="annonce" id="annonce_' . $annonce['num_apart'] . '">';
    echo '<h3>Numéro d\'appartement : ' . $annonce['num_apart'] . '</h3>';
    echo '<p>Type d\'appartement : ' . $annonce['type_apart'] . '</p>';
    echo '<p>Prix location : ' . $annonce['prix_loc'] . '</p>';
    echo '<p>Prix charges : ' . $annonce['prix_charges'] . '</p>';
    echo '<p>Rue : ' . $annonce['rue'] . '</p>';
    echo '<p>Arrondissement : ' . $annonce['arrondissement'] . '</p>';
    echo '<p>Étage : ' . $annonce['etage'] . '</p>';
    echo '<p>Ascenseur : ' . $annonce['elevator'] . '</p>';
    echo '<p>Préavis : ' . $annonce['preavis'] . '</p>';
    echo '<p>Date libre : ' . $annonce['date_libre'] . '</p>';

    echo '<button type="button" id="button_visiter_' . $annonce['num_apart'] . '" style="display: inline-block;" onclick="toggleForm(\'form_' . $annonce['num_apart'] . '\', \'button_visiter_' . $annonce['num_apart'] . '\', \'close_' . $annonce['num_apart'] . '\')">Visiter</button>';
    echo '<span class="close" id="close_' . $annonce['num_apart'] . '" onclick="closeForm(\'form_' . $annonce['num_apart'] . '\', \'button_visiter_' . $annonce['num_apart'] . '\', \'close_' . $annonce['num_apart'] . '\')" style="display: none;">&times;</span>';
    echo '<button type="button" onclick="submitDemande(' . $annonce['num_apart'] . ')">Louer</button>';

    echo '<form action="../C/c_visites.php" method="post" id="form_' . $annonce['num_apart'] . '" style="display:none;">';
    echo '   <input type="hidden" name="num_apart" value="' . $annonce['num_apart'] . '">';
    echo '   <input type="hidden" name="num_dem" value="' . $demandeur['num_dem'] . '">';
    echo '   <label for="date_visite">Date de visite :</label>';
    echo '   <input type="date" name="date_visite" required>';
    echo '   <button type="button" onclick="submitForm(' . $annonce['num_apart'] . ', \'enregistrer\')">Valider</button>';
    echo '   <button type="button" onclick="clearDate(' . $annonce['num_apart'] . ')">Annuler</button>';
    // Ajout de la balise div pour les messages d'alerte
    echo '   <div id="message_' . $annonce['num_apart'] . '"></div>';
    echo '</form>';

    echo '</div>';
}

echo '</div>';
?>

<script>
function submitForm(num_apart, action) {
    var form = document.getElementById('form_' + num_apart);
    var formData = new FormData(form);
    
    formData.append('action', action);
    
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            var messageContainer = document.getElementById('message_' + num_apart);
            messageContainer.innerHTML = '<p>' + xhr.responseText + '</p>';
            
            if (xhr.responseText.includes('enregistrée avec succès') || xhr.responseText.includes('supprimée avec succès')) {
                messageContainer.style.color = 'green';
                // Affiche le bouton OK
                document.getElementById('button_ok_' + num_apart).style.display = 'block';
            } else {
                messageContainer.style.color = 'red';
            }
        }
    };
    
    xhr.open('POST', form.action, true);
    xhr.send(formData);
}

function toggleForm(formId, buttonId, closeId) {
    var form = document.getElementById(formId);
    var button = document.getElementById(buttonId);
    var close = document.getElementById(closeId);

    if (form.style.display === 'none') {
        // Affiche le formulaire
        form.style.display = 'block';
        // Masque le bouton "Visiter"
        button.style.display = 'none';
        // Affiche la croix
        close.style.display = 'inline-block';
    } else {
        // Masque le formulaire
        form.style.display = 'none';
        // Affiche le bouton "Visiter"
        button.style.display = 'inline-block';
        // Masque la croix
        close.style.display = 'none';
    }
}

function closeForm(formId, buttonId, closeId) {
    var form = document.getElementById(formId);
    var button = document.getElementById(buttonId);
    var close = document.getElementById(closeId);

    // Masque le formulaire
    form.style.display = 'none';
    // Affiche le bouton "Visiter"
    button.style.display = 'inline-block';
    // Masque la croix
    close.style.display = 'none';
}

function clearDate(num_apart) {
    var dateInput = document.querySelector('form#form_' + num_apart + ' input[name="date_visite"]');
    dateInput.value = ''; // Efface la date entrée par l'utilisateur
}
function submitDemande(num_apart) {
    var formData = new FormData();
    formData.append('num_dem', <?php echo $demandeur['num_dem']; ?>); // ID du demandeur connecté
    formData.append('num_apart', num_apart); // ID de l'appartement choisi
    
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Afficher un message de succès ou d'erreur, ou rafraîchir la page
            alert(xhr.responseText); // Remplacez alert par votre propre méthode d'affichage
            // Si succès, peut-être actualiser la page pour refléter les changements dans la liste des annonces
            window.location.reload();
        }
    };
    
    xhr.open('POST', '../C/c_demandesDemandeur.php', true);
    xhr.send(formData);
}
</script>
<style>
   
    #annonces-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 20px;
        margin-top: 20px;
    }

    .annonce {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        width: calc(25% - 40px); /* Ajustez la largeur des annonces en fonction de vos besoins */
        box-sizing: border-box;
        position: relative;
        margin-bottom: 20px; /* Ajout de marge en bas pour l'espace entre les annonces */
    }

    .annonce h3 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .annonce p {
        margin: 5px 0;
    }

    .annonce button {
        padding: 8px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }

    .annonce button:hover {
        background-color: #0056b3;
    }

    .annonce form {
        margin-top: 10px;
    }

    .annonce form label {
        display: block;
        margin-bottom: 5px;
    }

    .annonce form input[type="date"] {
        width: 100%;
        padding: 5px 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }

    .annonce .close {
        position: absolute;
        top: 5px;
        right: 5px;
        cursor: pointer;
    }
</style>

