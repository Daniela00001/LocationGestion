<?php
require '../M/Modele Visites.php';
@session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['num_apart'])) {
    $num_apart = $_POST['num_apart'];

    // Créer un objet Visite à partir des données postées
    $visite = Visite::fromArrayToObject($_POST); 

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
$proprietaire = $_SESSION["proprietaire"];
$visites = Visite::getVisitesProprietaire($proprietaire->getNumProp());
?>
