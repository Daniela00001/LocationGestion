<?php
include 'v_espace_demandeur.php';

include '../C/c_annoncesDemandeur.php';
require_once '../M/Modele  Appartement.php';
@session_start();
include_once '../M/Modele  Demandeur.php';
//$demandeur = $_SESSION["demandeur"];

echo '<div id="annonces-container">';

//var_dump($annonces);
//var_dump($_SESSION);
//echo count($annonces);


foreach ($annonces as $annonce) {
    echo '<div class="annonce" id="annonce_' .  $annonce->getNumApart() . '">';
    echo '<h3>Numéro d\'appartement : ' . $annonce->getNumApart() . '</h3>';
    echo '<p>Type d\'appartement : ' . $annonce->getTypeApart() . '</p>';
    echo '<p>Prix location : ' . $annonce->getPrixLoc() . '</p>';
    echo '<p>Prix charges : ' . $annonce->getPrixCharges() . '</p>';
    echo '<p>Rue : ' . $annonce->getRue() . '</p>';
    echo '<p>Arrondissement : ' . $annonce->getArrondissement() . '</p>';
    echo '<p>Étage : ' . $annonce->getEtage() . '</p>';
    echo '<p>Ascenseur : ' . $annonce->getElevator() . '</p>';
    echo '<p>Préavis : ' . $annonce->getPreavis() . '</p>';
    echo '<p>Date libre : ' . $annonce->getDateLibre() . '</p>';
    
    echo '<button type="button" id="button_visiter_' . $annonce->getNumApart() . '" style="display: inline-block;" onclick="toggleForm(\'form_' . $annonce->getNumApart() . '\', \'button_visiter_' . $annonce->getNumApart() . '\', \'close_' . $annonce->getNumApart() . '\')">Visiter</button>';
    echo '<span class="close" id="close_' . $annonce->getNumApart() . '" onclick="closeForm(\'form_' . $annonce->getNumApart() . '\', \'button_visiter_' . $annonce->getNumApart() . '\', \'close_' . $annonce->getNumApart() . '\')" style="display: none;">&times;</span>';
    echo '<button type="button" onclick="submitDemande(' . $annonce->getNumApart() . ')">Louer</button>';

    echo '<form action="../C/c_visites.php" method="post" id="form_' . $annonce->getNumApart() . '" style="display:none;">';
    echo '   <input type="hidden" name="num_apart" value="' . $annonce->getNumApart() . '">';
    echo '   <input type="hidden" name="num_dem" value="' . $_SESSION["demandeur"]->getNumDem() . '">';
    echo '   <label for="date_visite">Date de visite :</label>';

    echo '   <input type="date" name="date_visite" required>';
    
    echo '   <input type="hidden" name="action" value="enregistrer" required>';

    echo '   <button type="submit" onclick="submitForm(' . $annonce->getNumApart() . ', \'enregistrer\')">Valider</button>';
    echo '   <button type="button" onclick="clearDate(' . $annonce->getNumApart() . ')">Annuler</button>';
    
    echo '   <div id="message_' . $annonce->getNumApart() . '"></div>';
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
    formData.append('num_dem', <?php echo isset($_SESSION["demandeur"]) ? $_SESSION["demandeur"]->getNumDem() : ''; ?>); // ID du demandeur connecté
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