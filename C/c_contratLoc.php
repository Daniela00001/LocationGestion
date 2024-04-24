<?php
require_once '../M/Modele  Locataire.php'; 

// Démarrage de la session
@session_start();

// Vérifier si le locataire est connecté
if (isset($_SESSION["locataire"]) && is_object($_SESSION["locataire"])) {
    // Récupérer l'objet Locataire depuis la session
    $locataire = $_SESSION["locataire"];

    // Récupérer le numéro de locataire
    $num_loc = $locataire->getNumLoc();

    // Récupérer les informations nécessaires à partir de l'objet Locataire
    $infos_locataire_appartement = $locataire->getContratLoc();
    // Passer le numéro de locataire comme argument à getTotalAPayer()
    $total_a_payer = $locataire->getTotalAPayer($num_loc);
} else {
    // Si le locataire n'est pas connecté, redirigez-le vers la page de connexion ou affichez un message d'erreur
    header("Location:  ../V/v_connexionL.php");
    exit();
}
?>
