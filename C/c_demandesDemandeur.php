<?php

require_once '../M/Modele  Demande.php'; // Utilisez require_once pour inclure le fichier une seule fois
include_once '../M/Modele  Demandeur.php';// Utilisez require_once pour inclure le fichier une seule fois

@session_start();
$demandeur = $_SESSION["demandeur"];

$demandes = DemandeLocation::getDemandesLocationDemandeur($demandeur->getNumDem());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifie si les données nécessaires sont présentes dans la requête
    if (isset($_POST['num_apart'])) {
        // Récupère le numéro de l'appartement à partir de la requête
        $num_apart = $_POST['num_apart'];

        // Crée une nouvelle demande de location avec le numéro du demandeur et le numéro de l'appartement
        $demande_location = new DemandeLocation("",$demandeur->getNumDem(), $num_apart);

        // Enregistre la demande de location et récupère le message de retour
        $message = $demande_location->enregistrerDemandeLocation();

        // Affiche le message de retour
        echo $message;
    } else {
        // Répond avec un message d'erreur si les données nécessaires ne sont pas présentes
        echo "Erreur : Données manquantes pour enregistrer la demande de location.";
    }
}
?>
