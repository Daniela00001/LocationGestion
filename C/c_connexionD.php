<?php
require '../M/Modele  Demandeur.php'; // Inclut le fichier contenant la classe Demandeur
session_start(); // Démarre la session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['deconnexion'])) {
        unset($_SESSION['demandeur']);
        header("Location: ../V/v_connexionD.php");
        exit();
    } else{
    $login = $_POST["login_dem"];
    $mdp_dem = $_POST["mdp_dem"];


    $demandeur = Demandeur::verifierDemandeur($login, $mdp_dem);
     
   
    if ($demandeur !== null) { 
        $_SESSION["demandeur"] = $demandeur;
        header("Location: ../V/v_home_demandeur.php");
        exit();
    } else {
        $message = "Identifiants incorrects. Veuillez réessayer.";
        echo $message;
    }
}
}
?>
