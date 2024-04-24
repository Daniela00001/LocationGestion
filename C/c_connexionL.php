<?php
require '../M/Modele  Locataire.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['deconnexion'])) {
        session_destroy();
        header("Location: ../V/v_connexionL.php");
        exit();
    } else {
        $login = $_POST["login_loc"];
        $mdp_loc = $_POST["mdp_loc"];

        // Utilisez la méthode verifierLocataire() pour vérifier les informations d'identification
        $locataire = Locataire::verifierLocataire($login, $mdp_loc);

        if ($locataire !== null) { // Vérifie si un objet Locataire a été retourné
            // Stocke directement l'objet Locataire dans la session
            $_SESSION["locataire"] = $locataire; 
            header("Location: ../V/v_home_locataire.php");
            exit();
        } else {
            $message = "Identifiants incorrects. Veuillez réessayer.";
            echo $message; // Ajoutez ceci pour voir le message d'erreur
        }
    }
}

// Si la méthode n'est pas POST, vous pouvez ajouter d'autres logiques ici si nécessaire.
?>
