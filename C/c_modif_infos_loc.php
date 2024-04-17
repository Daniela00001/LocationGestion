<?php

require '../M/Modele  Locataire.php';

if (isset($_POST['update'])) {
    // Vérification des données reçues depuis le formulaire
    if (isset($_POST['nom_loc'], $_POST['prenom_loc'], $_POST['date_naissance'], $_POST['telephone_loc'], $_POST['numCompt_loc'], $_POST['banque'], $_POST['adresse_banque_loc'], $_POST['cp_banque_loc'], $_POST['login_loc'], $_POST['mdp_loc'], $_POST['num_loc'])) {
        $num_loc = $_POST['num_loc'];
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
       
        // Création de l'objet Locataire
        $locataire = new Locataire($nom_loc, $prenom_loc, $date_naissance, $telephone_loc, $numCompt_loc, $banque, $adresse_banque_loc, $cp_banque_loc, $login_loc, $mdp_loc);

        // Appel de la fonction pour mettre à jour les informations du locataire
        $success = $locataire->updateInfo($nom_loc, $prenom_loc, $date_naissance, $telephone_loc, $numCompt_loc, $banque, $adresse_banque_loc, $cp_banque_loc, $login_loc, $mdp_loc, $num_loc);

        if ($success) {
            echo "Mise à jour réussie!";
           
            session_start();
            
            $locataire_data = Locataire::getLocataireById($num_loc);
            header("Location: ../V/v_profil_locataire.php");
            exit(); // Assurez-vous de terminer l'exécution du script après la redirection
        } else {
            echo "Erreur lors de la mise à jour. Veuillez réessayer.";
        }
    
}}
?>
