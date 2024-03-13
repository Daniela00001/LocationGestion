<?php
require '../M/Class Locataire.php';

    
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['num_loc'])) {
    $num_loc = $_POST['num_loc'];

    $locataire = new Locataire();

    $suppression_reussie = $locataire->supprimerLocataire($num_loc);

    header("Location: ../V/v_home_propietaire.php");
        exit; 
    }
?>

