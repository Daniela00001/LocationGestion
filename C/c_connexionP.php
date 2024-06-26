<?php

require '../M/Modele  Proprietaire.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['deconnexion'])) {
        unset($_SESSION['proprietaire']); // ou unset($_SESSION['demandeur']) ou unset($_SESSION['locataire'])
        header("Location: ../V/v_connexionP.php");
        exit();
    } else {
        $login = $_POST["login"];
        $mdp_prop = $_POST["mdp_prop"];


        $proprietaire = Proprietaire::verifierProprietaire($login, $mdp_prop);
     
        if ($proprietaire !== null) { 
            $_SESSION["proprietaire"] = $proprietaire; 
            header("Location: ../V/v_home_propietaire.php");
            exit();
        } else {
            $message = "Identifiants incorrects. Veuillez réessayer.";
            echo $message; // Ajoutez ceci pour voir le message d'erreur
        }
    }
}

// Si la méthode n'est pas POST, vous pouvez ajouter d'autres logiques ici si nécessaire.

?>
