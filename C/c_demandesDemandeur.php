<?php

require '../M/Class Demande.php';
@session_start();
$demandeur = $_SESSION["demandeur"];

$demandes = DemandeLocation::getDemandesLocationDemandeur($demandeur['num_dem']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifie si les données nécessaires sont présentes dans la requête
    if (isset($_POST['num_dem']) && isset($_POST['num_apart'])) {
        // Récupère les données de la requête
        $num_dem = $_POST['num_dem'];
        $num_apart = $_POST['num_apart'];

        $demande_location = new DemandeLocation($num_dem, $num_apart);

        $message = $demande_location->enregistrerDemandeLocation();

        echo $message;
    } else {
        // Répond avec un message d'erreur si les données nécessaires ne sont pas présentes
        echo "Erreur : Données manquantes pour enregistrer la demande de location.";
    }
} 


?>
