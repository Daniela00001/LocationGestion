<?php
require '../M/Modele  Demande.php';
@session_start();

// Vérifie si l'objet Demandeur est présent dans la session
if(isset($_SESSION["demandeur"])) {
    // Récupérer l'objet Demandeur depuis la session
    $demandeur = $_SESSION["demandeur"];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifie si les données nécessaires sont présentes dans la requête
        if (isset($_POST['action']) && $_POST['action'] === 'supprimer_demande' && isset($_POST['ID_demande'])) {
            // Récupère l'ID de la demande à supprimer depuis le formulaire
            $ID_demande = $_POST['ID_demande'];

            // Créez une instance de la classe DemandeLocation en passant le numéro demandeur
            $demande_location = new DemandeLocation($demandeur->getNumDem(), null); // Null ou une valeur appropriée pour l'appartement

            // Appel de la méthode supprimerDemande avec l'ID de la demande à supprimer
            $message = $demande_location->supprimerDemande($ID_demande);

            // Redirection vers la page des demandes après suppression
            header("Location: ../V/v_demandes_Demandeur.php");
        } else {
            // Répond avec un message d'erreur si l'action n'est pas reconnue ou si des données nécessaires sont manquantes
            echo "Erreur : Action non reconnue ou données manquantes.";
        }
    } else {
        // Répond avec un message d'erreur si ce n'est pas une requête POST
        echo "Erreur : Requête non autorisée.";
    }
} else {
    // Gérer le cas où l'objet Demandeur n'est pas présent dans la session
    echo "Objet Demandeur non trouvé dans la session.";
}

?>
