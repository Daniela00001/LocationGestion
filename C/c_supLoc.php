<?php
require '../M/Modele  Locataire.php'; // Assurez-vous d'utiliser le bon modèle

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['num_loc'])) {
    $num_loc = $_GET['num_loc'];

    $locataire = new Locataire(); // Utilisez le bon nom de classe

    $suppression_reussie = $locataire->supprimerLocataire($num_loc);

    if ($suppression_reussie) {
        header("Location: ../V/v_confirmation_supProp.php");
        exit;
    } else {
        echo "La suppression a échoué."; // Gérer l'échec de la suppression
    }
}
?>
