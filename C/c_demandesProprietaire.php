<?php
require '../M/Class Demande.php';

$proprietaire = $_SESSION["proprietaire"];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['refuser'])) {
    // Vérification si l'ID de demande est présent
    if (isset($_POST['ID_demande'])) {
        // Récupération de l'ID de demande depuis le formulaire
        $ID_demande = $_POST['ID_demande'];

        // Création d'un objet DemandeLocation
        $demande = new DemandeLocation(null, null);

        // Appel de la méthode pour refuser la demande
        $message = $demande->refuserDemande($ID_demande);

        // Redirection vers la page précédente ou autre action nécessaire
        header("Location: ../V/v_demandes_prop.php");
        exit;
    } else {
        // Si l'ID de demande est absent, afficher un message d'erreur ou gérer autrement
        echo "ID de demande manquant.";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accepter'])) {
    // Vérification si l'ID de demande est présent
    if (isset($_POST['ID_demande'])) {
        $ID_demande = $_POST['ID_demande'];

        // Création d'un objet DemandeLocation
        $demande = new DemandeLocation(null, null);

        // Appel de la méthode pour refuser la demande
        $message = $demande->accepterDemande($ID_demande);

        // Redirection vers la page précédente ou autre action nécessaire
        header("Location: ../V/v_demandes_prop.php");
        exit;
    } else {
        // Si l'ID de demande est absent, afficher un message d'erreur ou gérer autrement
        echo "ID de demande manquant.";
    }
}

// Récupérer à nouveau la liste des demandes après la mise à jour
$demandes = DemandeLocation::getDemandesProprietaire($proprietaire['num_prop']);



?>
