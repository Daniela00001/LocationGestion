<?php
@session_start();
require 'param_connexion_BdD.php';
require '../M/Class Visites.php';


$proprietaire = $_SESSION["proprietaire"];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['num_apart'])) {
    $num_apart = $_POST['num_apart'];

    // Créer une instance de la classe Visite
    $visite = new Visite($num_apart, null, null);
    
    // Appeler la méthode supprimerVisiteProp() sur l'objet $visite en passant l'argument nécessaire
    $success = $visite->supprimerVisiteProp($num_apart); // Retourne true si la visite a été supprimée avec succès

    // Vérifier le résultat de la suppression
    if ($success) {
        // Redirection vers la vue des visites après la suppression réussie
        header("Location: ../V/v_visites_prop.php");
        exit(); // Arrête l'exécution du script après la redirection
    } else {
        echo "Erreur lors de la suppression de la visite.";
        // Gérer l'erreur de suppression si nécessaire
    }
}

// Récupérer à nouveau la liste des visites après la suppression
$visites = Visite::getVisitesProprietaire($proprietaire['num_prop']);

?>
