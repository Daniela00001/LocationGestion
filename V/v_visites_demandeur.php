<?php
include 'v_espace_demandeur.php';
include '../C/c_visites.php';

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
    // Convertir chaque élément de $visites en objet Visite
    $visiteObj = Visite::fromArrayToObject($visite);
    $appartObj= Appartement::fromArrayToObject($visite);
    
    echo '<div class="visite" id="visite_' . $visiteObj->getNumApart() . '">';
    echo '<h3>Numéro d\'appartement : ' . $visiteObj->getNumApart() . '</h3>';
    echo '<p>Date de visite : ' . $visiteObj->getdate_visiteDemande() . '</p>';
    
    // Formulaire pour modifier la date de visite
    echo '<form id="form_' . $visiteObj->getNumApart() . '" method="post" action="../C/c_visites.php">';
    echo '<input type="hidden" name="num_apart" value="' . $visiteObj->getNumApart() . '">';
    echo '<input type="hidden" name="date_visite" value="' . $visiteObj->getdate_visiteDemande() . '">';
    echo '<input type="hidden" name="num_dem" value="' . $visiteObj->getNumDem() . '">';
    echo '<input type="hidden" name="action" value="modifier">';
    echo '<label for="nouvelle_date_' . $visiteObj->getNumApart() . '">Nouvelle date de visite :</label>';
    echo '<input type="date" id="nouvelle_date_' . $visiteObj->getNumApart() . '" name="nouvelle_date_visite" required>';
    echo '<input type="submit" value="Modifier la visite">';
    echo '</form>';

    // Affiche les détails de l'appartement associé à la visite
    echo '<p>Type d\'appartement : ' . $appartObj->getTypeApart() . '</p>';
    echo '<p>Prix location : ' . $appartObj->getPrixLoc() . '</p>';
    echo '<p>Prix charges : ' . $appartObj->getPrixCharges() . '</p>';
    echo '<p>Rue : ' . $appartObj->getRue() . '</p>';
    echo '<p>Arrondissement : ' . $appartObj->getArrondissement() . '</p>';
    echo '<p>Étage : ' . $appartObj->getEtage() . '</p>';
    echo '<p>Ascenseur : ' . $appartObj->getElevator() . '</p>';
    echo '<p>Préavis : ' . $appartObj->getPreavis() . '</p>';
    echo '<p>Date libre : ' . $appartObj->getDateLibre() . '</p>';

    // Formulaire pour supprimer la visite
    echo '<form id="form_' . $visiteObj->getNumApart() . '" method="post" action="../C/c_visites.php" onsubmit="return confirmSuppression(\' ' . $visiteObj->getNumApart() . ' \');">';
    echo '<input type="hidden" name="num_apart" value="' . $visiteObj->getNumApart() . '">';
    echo '<input type="hidden" name="date_visite" value="' . $visiteObj->getdate_visiteDemande() . '">';
    echo '<input type="hidden" name="num_dem" value="' . $visiteObj->getNumDem() . '">';
    echo '<input type="hidden" name="action" value="supprimer">';
    echo '<input type="submit" value="Supprimer la visite">';
    echo '</form>';
    
    echo '</div>'; // Fermeture de la balise div.visite
}

echo '</div>'; // Fermeture de la balise div#visites-container
?>
<div id="confirmationMessage"></div>
