<?php
include 'v_espace_proprietaire.php';
include '../C/c_visitesProp.php';

$proprietaire = $_SESSION["proprietaire"];
?>
<br>
<br>
<br>

<link rel="stylesheet" href="CSS/styleSessionProp.css">
<H1>Vos vistes </H1>
<?php
echo '<div id="visites-container">';

foreach ($visites as $visite) {
    echo '<div class="visite" id="visite_' . $visite['num_apart'] . '">';
    echo '<h3>Numéro d\'appartement : ' . $visite['num_apart'] . '</h3>';
    echo '<p>Date de visite : ' . $visite['date_visite'] . '</p>';
    echo '<p>Numero demandeur : ' . $visite['num_dem'] . '</p>';
    
    
    echo '<form method="POST" action="../C/c_visitesProp.php">'; 
    echo '<input type="hidden" name="num_apart" value="' . $visite['num_apart'] . '">';
    echo '<button type="submit">Supprimer</button>';
    echo '</form>';
    
    echo '</div>'; 
}

echo '</div>'; 
?>
<br>
<style>

</style>