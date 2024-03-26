<?php
require '../M/Class Locataire.php';

// Vérifie si la méthode de requête est POST
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['num_loc'])) {
    // Récupère le numéro de locataire à partir des données POST
    $num_loc = $_POST['num_loc'];

    // Crée une nouvelle instance de la classe Locataire
    $locataire = new Locataire();

    // Appelle la méthode supprimerLocataire avec le numéro de locataire récupéré
    $suppression_reussie = $locataire->supprimerLocataire($num_loc);

    // Redirige vers la page de confirmation après la suppression
    header("Location: ../V/v_home_propietaire.php");
    exit; 
}
?>
