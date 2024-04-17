<?php

require '../M/Modele  Demande.php';
@session_start();
$demandeur = $_SESSION["demandeur"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifie si les données nécessaires sont présentes dans la requête
    if (isset($_POST['action']) && $_POST['action'] === 'supprimer_demande' && isset($_POST['ID_demande'])) {
        // Récupère l'ID de la demande à supprimer depuis le formulaire
        $ID_demande = $_POST['ID_demande'];

        // Créez une instance de la classe DemandeLocation en passant les numéros demandeur et appartement
        $demande_location = new DemandeLocation($demandeur['num_dem'], null); // Null ou une valeur appropriée pour l'appartement

        // Appel de la méthode supprimerDemande avec l'ID de la demande à supprimer
        $message = $demande_location->supprimerDemande($ID_demande);

        // Affichage du message résultant de la suppression
        header("Location: ../V/v_demandes_Demandeur.php");
    } else {
        // Répond avec un message d'erreur si l'action n'est pas reconnue ou si des données nécessaires sont manquantes
        echo "Erreur : Action non reconnue ou données manquantes.";
    }
} else {
    // Répond avec un message d'erreur si ce n'est pas une requête POST
    echo "Erreur : Requête non autorisée.";
}

?>
