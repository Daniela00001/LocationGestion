<?php
include 'v_espace_demandeur.php';
include '../C/c_visites.php';

@session_start();
$demandeur = $_SESSION["demandeur"];
?>
<br>
<br>
<br>

<link rel="stylesheet" href="CSS/styleSessionDem.css">
<H1>Vos vistes </H1>
<?php
echo '<div id="visites-container">';

foreach ($visites as $visite) {
    echo '<div class="visite" id="visite_' . $visite['num_apart'] . '">';
    echo '<h3>Numéro d\'appartement : ' . $visite['num_apart'] . '</h3>';
    echo '<p>Date de visite : ' . $visite['date_visite'] . '</p>';
    
    // Affiche les détails de l'appartement associé à la visite
    echo '<p>Type d\'appartement : ' . $visite['type_apart'] . '</p>';
    echo '<p>Prix location : ' . $visite['prix_loc'] . '</p>';
    echo '<p>Prix charges : ' . $visite['prix_charges'] . '</p>';
    echo '<p>Rue : ' . $visite['rue'] . '</p>';
    echo '<p>Arrondissement : ' . $visite['arrondissement'] . '</p>';
    echo '<p>Étage : ' . $visite['etage'] . '</p>';
    echo '<p>Ascenseur : ' . $visite['elevator'] . '</p>';
    echo '<p>Préavis : ' . $visite['preavis'] . '</p>';
    echo '<p>Date libre : ' . $visite['date_libre'] . '</p>';

    echo '<form id="form_' . $visite['num_apart'] . '" method="post" action="../C/c_visites.php" onsubmit="return confirmSuppression(\' ' . $visite['num_apart'] . ' \');">';
    echo '<input type="hidden" name="num_apart" value="' . $visite['num_apart'] . '">';
    echo '<input type="hidden" name="date_visite" value="' . $visite['date_visite'] . '">';
    echo '<input type="hidden" name="num_dem" value="' . $visite['num_dem'] . '">';
    echo '<input type="hidden" name="action" value="supprimer">';
    echo '<input type="submit" value="Supprimer la visite">';
    echo '</form>';
    
    echo '</div>'; // Fermeture de la balise div.visite
}

echo '</div>'; // Fermeture de la balise div#visites-container
?>
<div id="confirmationMessage"></div>
<script>
function confirmSuppression(num_apart) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cette visite?")) {
        // Soumet le formulaire avec l'ID approprié
        var form = document.getElementById("form_" + num_apart);
        var formData = new FormData(form);

        // Utilisez fetch pour soumettre le formulaire de manière asynchrone
        fetch(form.action, {
            method: form.method,
            body: formData
        })
        .then(response => response.text())
        .then(message => {
            // Affichez le message de confirmation dans une alerte
            alert(message);

            // Mettez à jour la balise avec l'identifiant "confirmationMessage" avec le message de confirmation
            document.getElementById("confirmationMessage").innerHTML = '<p>' + message + '</p>';
        })
        .catch(error => {
            console.error('Erreur lors de la suppression de la visite : ', error);
        });

        return false;
    } else {
        return false;
    }
}

</script>
