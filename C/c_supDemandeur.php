<?php
require '../M/Class Demandeur.php';

// Vérifier si le numéro de demandeur est soumis via le formulaire
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['num_dem'])) {
    // Récupérer le numéro de demandeur depuis le formulaire
    $num_dem = $_GET['num_dem'];

    $demandeur = new Demandeur();

    // Appeler la méthode pour supprimer le demandeur de la base de données
    $suppression_reussie = $demandeur->supprimerDemandeur($num_dem);

    // Vérifier si la suppression a réussi
    
        header("Location: ../V/v_confirmation_suite.php");
        exit; 
    }
?>
