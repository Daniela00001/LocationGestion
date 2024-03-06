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
#visites-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.visite {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 10px;
    width: calc(20% - 10px); /* Pour afficher 3 éléments par ligne avec un espacement de 20px */
}

.visite h3 {
    margin-top: 0;
    font-size: 18px;
    font-weight: bold;
}

.visite p {
    margin-bottom: 10px;
}

.visite form {
    display: inline-block;
}

.visite button {
    background-color: purple;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.visite button:hover {
    background-color: #7d26cd;
}
</style>