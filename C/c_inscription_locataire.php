<?php
require '../M/Class Locataire.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifie si toutes les données du formulaire sont présentes
    if (isset($_POST['nom_loc'], $_POST['prenom_loc'], $_POST['date_naissance'], $_POST['telephone_loc'], $_POST['numCompt_loc'], $_POST['banque'], $_POST['adresse_banque_loc'], $_POST['cp_banque_loc'], $_POST['login_loc'], $_POST['mdp_loc'], $_POST['num_apart'],$_POST['num_dem'])) {
        // Récupère les données du formulaire
        $nom_loc = $_POST['nom_loc'];
        $prenom_loc = $_POST['prenom_loc'];
        $date_naissance = $_POST['date_naissance'];
        $telephone_loc = $_POST['telephone_loc'];
        $numCompt_loc = $_POST['numCompt_loc'];
        $banque = $_POST['banque'];
        $adresse_banque_loc = $_POST['adresse_banque_loc'];
        $cp_banque_loc = $_POST['cp_banque_loc'];
        $login_loc = $_POST['login_loc'];
        $mdp_loc = $_POST['mdp_loc'];
        $num_apart = $_POST['num_apart']; 
        $num_dem = $_POST['num_dem']; 

       
        $locataire = new Locataire($nom_loc, $prenom_loc, $date_naissance, $telephone_loc, $numCompt_loc, $banque, $adresse_banque_loc, $cp_banque_loc, $login_loc, $mdp_loc, $num_apart,$num_dem);

        try {
            // Tente d'effectuer l'inscription du locataire en appelant la méthode "inscription()"
            $locataire->inscription();

            // Redirige vers une page de confirmation si l'inscription est réussie
            header("Location: ../V/v_confirmation_inscriptionL.php");
            exit(); // Arrête l'exécution du script après la redirection
        } catch (PDOException $e) {
            // Capture une éventuelle erreur et affiche un message d'erreur
            echo "Erreur lors de l'inscription : " . $e->getMessage();
        }
    } else {
        // Affiche un message d'erreur si toutes les données du formulaire ne sont pas présentes
        echo "Tous les champs du formulaire doivent être remplis.";
    }
}
?>
