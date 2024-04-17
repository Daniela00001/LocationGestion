<?php
require '../M/Modele  Proprietaire.php';

// Vérifier si le numéro de demandeur est soumis via le formulaire
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['num_prop'])) {
    // Récupérer le numéro de demandeur depuis le formulaire
    $num_prop = $_GET['num_prop'];

    $proprietaire = new Proprietaire();

    // Appeler la méthode pour supprimer le demandeur de la base de données
    $suppression_reussie = $proprietaire->supprimerProprietaire($num_prop);

   
        header("Location: ../V/v_confirmation_supProp.php");
        exit; 
    }
?>
