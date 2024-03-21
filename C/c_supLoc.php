<?php
require '../M/Class Locataire.php';

    
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['num_loc'])) {
    $num_loc = $_GET['num_loc'];

    $locataire = new Locataire();

    $suppression_reussie = $locataire->supprimerLocataire($num_loc);

    header("Location: ../V/v_confirmation_suite.php");
        exit; 
    }
?>


