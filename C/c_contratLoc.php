<?php
require_once '../M/Class Locataire.php'; // Assurez-vous que le chemin vers votre classe Locataire est correct

// Vérifier si le locataire est connecté
if (isset($_SESSION["locataire"])) {
    // Récupérer le numéro de locataire
    $num_loc = $_SESSION["locataire"]['num_loc'];

    // Instancier la classe Locataire
    $locataire = new Locataire();

    // Exécuter la requête SQL pour récupérer toutes les informations nécessaires
    $infos_locataire_appartement = $locataire->getContratLoc($num_loc);
    $total_a_payer = $locataire->getTotalAPayer($num_loc);
    // Charger la vue pour afficher les informations
   
} else {
    // Si le locataire n'est pas connecté, redirigez-le vers la page de connexion ou affichez un message d'erreur
    header("Location: chemin_vers_page_de_connexion.php");
    exit();
}
?>
