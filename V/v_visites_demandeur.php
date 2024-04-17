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
<H1>Vos visites </H1>
<?php
echo '<div id="visites-container">';

foreach ($visites as $visite) {
    echo '<div class="visite" id="visite_' . $visite['num_apart'] . '">';
    echo '<h3>Numéro d\'appartement : ' . $visite['num_apart'] . '</h3>';
    echo '<p>Date de visite : ' . $visite['date_visite'] . '</p>';
    
    // Formulaire pour modifier la date de visite
    echo '<form id="form_' . $visite['num_apart'] . '" method="post" action="../C/c_visites.php">';
    echo '<input type="hidden" name="num_apart" value="' . $visite['num_apart'] . '">';
    echo '<input type="hidden" name="date_visite" value="' . $visite['date_visite'] . '">';
    echo '<input type="hidden" name="num_dem" value="' . $visite['num_dem'] . '">';
    echo '<input type="hidden" name="action" value="modifier">';
    echo '<label for="nouvelle_date_' . $visite['num_apart'] . '">Nouvelle date de visite :</label>';
    echo '<input type="date" id="nouvelle_date_' . $visite['num_apart'] . '" name="nouvelle_date_visite" required>';
    echo '<input type="submit" value="Modifier la visite">';
    echo '</form>';

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

    // Formulaire pour supprimer la visite
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
