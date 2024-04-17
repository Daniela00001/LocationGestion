<?php
require '../M/Modele  Demandeur.php'; // Assurez-vous du bon chemin vers votre modèle

// Vérifier si le numéro de demandeur est soumis via le formulaire
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['num_dem'])) {
    // Récupérer le numéro de demandeur depuis le formulaire
    $num_dem = $_GET['num_dem'];

    $demandeur = new Demandeur();

    // Appeler la méthode pour supprimer le demandeur de la base de données
    $suppression_reussie = $demandeur->supprimerDemandeur($num_dem);

    if ($suppression_reussie) {
        header("Location: ../V/v_confirmation_supProp.php");
        exit; 
    } else {
        echo "La suppression du demandeur a échoué.";
        // Gérer l'affichage d'un message d'erreur ou rediriger vers une page d'erreur
    }
}
?>
