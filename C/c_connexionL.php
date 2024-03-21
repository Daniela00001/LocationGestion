
<?php

require '../M/Class Locataire.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['deconnexion'])) {
        session_destroy();
        header("Location: ../V/v_connexion_locataire.php");
        exit();
    } else {
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
            echo $message; // Ajoutez ceci pour voir le message d'erreur
        }
    }
}

// Si la méthode n'est pas POST, vous pouvez ajouter d'autres logiques ici si nécessaire.

?>
