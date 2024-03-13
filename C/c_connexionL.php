<?php
require '../M/Class Locataire.php'; // Inclut le fichier contenant la classe Demandeur
session_start(); // Démarre la session

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["login_loc"]) && isset($_POST["mdp_loc"])) {
    $login = $_POST["login_loc"];
    $mdp_loc = $_POST["mdp_loc"];




    $locataire = new Locataire();
    $result = $locataire->verifierLocataire($login, $mdp_loc);

    if ($result) {
        $_SESSION["locataire"] = $result;
        header("Location: ../V/v_home_locataire.php");
        exit();
    } else {
        $message = "Identifiants incorrects. Veuillez réessayer.";
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deconnexion'])) {
    session_destroy(); // Détruit la session actuelle lors de la déconnexion
    header("Location: ../V/v_connexionD.php");
    exit();
}
?>
