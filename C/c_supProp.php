<?php
require '../M/Class Proprietaire.php';

// Vérifier si le numéro de demandeur est soumis via le formulaire
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['num_prop'])) {
    // Récupérer le numéro de demandeur depuis le formulaire
    $num_prop = $_GET['num_prop'];

    $proprietaire = new Proprietaire();

    // Appeler la méthode pour supprimer le demandeur de la base de données
    $suppression_reussie = $proprietaire->supprimerProprietaire($num_prop);

    // Vérifier si la suppression a réussi
    
        header("Location: ../V/v_confirmation_suite.php");
        exit; 
    }
?>
