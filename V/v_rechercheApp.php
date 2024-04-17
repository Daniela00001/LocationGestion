
<?php
include 'v_espace_demandeur.php';
include '../C/c_annoncesDemandeur.php';
@session_start();
$demandeur = $_SESSION["demandeur"];

// Vérifier si des annonces sont disponibles dans l'URL
if(isset($_GET["annonces"])) {
    // Désérialiser les résultats de recherche
    $annonces = unserialize($_GET["annonces"]);
    
    // Vérifier si des annonces ont été trouvées
    if (!empty($annonces)) {
        echo "<div class='annonce-container'>";
        echo "<h3>Appartements disponibles à la location</h3>";
        // Parcourir les annonces et les afficher
        foreach ($annonces as $appartement) {
            echo "<div class='annonce'>";
            echo "<p>Arrondissement: " . $appartement['arrondissement'] . "</p>";
            echo "<p>Type: " . $appartement['type_apart'] . "</p>";
            echo "<p>Prix de location: " . $appartement['prix_loc'] . "</p>";
            echo "<p>Prix des charges: " . $appartement['prix_charges'] . "</p>";
            echo "<p>Rue: " . $appartement['rue'] . "</p>";
            echo "<p>Étage: " . $appartement['etage'] . "</p>";
            echo "<p>Ascenseur: " . ($appartement['elevator'] ? 'Oui' : 'Non') . "</p>";
            echo "<p>Préavis: " . $appartement['preavis'] . "</p>";
            echo "<p>Date disponible: " . $appartement['date_libre'] . "</p>";



            echo '<button type="button" onclick="submitDemande(' . $appartement['num_apart'] . ')">Louer</button>';
            echo '<button type="button" id="button_visiter_' . $appartement['num_apart'] . '" style="display: inline-block;" onclick="toggleForm(\'form_' . $appartement['num_apart'] . '\', \'button_visiter_' . $appartement['num_apart'] . '\', \'close_' . $appartement['num_apart'] . '\')">Visiter</button>';
            echo '<span class="close" id="close_' . $appartement['num_apart'] . '" onclick="closeForm(\'form_' . $appartement['num_apart'] . '\', \'button_visiter_' . $appartement['num_apart'] . '\', \'close_' . $appartement['num_apart'] . '\')" style="display: none;">&times;</span>';
           
            echo '<form action="../C/c_visites.php" method="post" id="form_' . $appartement['num_apart'] . '" style="display:none;">';
    echo '   <input type="hidden" name="num_apart" value="' . $appartement['num_apart'] . '">';
    echo '   <input type="hidden" name="num_dem" value="' . $demandeur['num_dem'] . '">';
    echo '   <label for="date_visite">Date de visite :</label>';
    echo '   <input type="date" name="date_visite" required>';
    echo '   <button type="button" onclick="submitForm(' . $appartement['num_apart'] . ', \'enregistrer\')">Valider</button>';
    echo '   <button type="button" onclick="clearDate(' . $appartement['num_apart'] . ')">Annuler</button>';
    
    echo '   <div id="message_' . $appartement['num_apart'] . '"></div>';
    echo '</form>';


            echo "</div>";
        }
        echo "</div>";
    } else {
        // Aucune annonce trouvée
        echo "<h3>Aucun appartement trouvé pour ce type.</h3>";
    }
} else {
    // Aucune donnée d'annonce n'a été transmise
    echo "<h3>Aucune annonce trouvée.</h3>";
}

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
            alert(xhr.responseText);
            // Si succès, peut-être actualiser la page pour refléter les changements dans la liste des annonces
            window.location.reload();
        }
    };
    
    xhr.open('POST', '../C/c_demandesDemandeur.php', true);
    xhr.send(formData);
}
</script>
