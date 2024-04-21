<?php
require_once '../M/Modele Admin.php'; // Assurez-vous que le chemin d'accès vers votre modèle Admin est correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si les champs login et mdp sont définis et non vides
    if (isset($_POST['login']) && isset($_POST['mdp']) && !empty($_POST['login']) && !empty($_POST['mdp'])) {
        // Récupère les données du formulaire
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];

        // Appelle la méthode de connexion de la classe Admin
        $admin = Admin::login($login, $mdp);
//var_dump($admin);
        if ($admin) {
            // Authentification réussie, redirige vers une vue appropriée
            header("Location: ../V/v_espace_admin.php");
            exit();
        } else {
            // Identifiants incorrects, redirige vers une vue de connexion avec un message d'erreur
            echo "identifiants incorrects";
            exit();
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}

?>
