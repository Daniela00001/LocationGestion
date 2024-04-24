<?php

require '../M/Modele  Demandeur.php';
session_start(); 


if (isset($_POST['update'])) {
    if (isset($_POST['nom_dem'], $_POST['prenom_dem'], $_POST['adresse_dem'], $_POST['cp_dem'], $_POST['telephone_dem'], $_POST['login_dem'], $_POST['mdp_dem'], $_POST['mdp_loc'])) {
       
        $num_dem = $_POST['num_dem'];
        $nom_dem = $_POST['nom_dem'];
        $prenom_dem = $_POST['prenom_dem'];
        $adresse_dem = $_POST['adresse_dem'];
        $cp_dem = $_POST['cp_dem'];
        $telephone_dem = $_POST['telephone_dem'];
        $login_dem = $_POST['login_dem'];
        $mdp_dem = $_POST['mdp_dem'];

        if (isset($_SESSION["demandeur"]) && is_object($_SESSION["demandeur"])) {
            $demandeur = $_SESSION["demandeur"];


            $success = $demandeur->updateInfo($nom_dem, $prenom_dem, $adresse_dem, $cp_dem, $telephone_dem, $login_dem, $mdp_dem);
          
          
            if ($success) {
                echo "Mise à jour réussie!";

                $num_dem = $_POST['num_dem'];
                $nom_dem = $_POST['nom_dem'];
                $prenom_dem = $_POST['prenom_dem'];
                $adresse_dem = $_POST['adresse_dem'];
                $cp_dem = $_POST['cp_dem'];
                $telephone_dem = $_POST['telephone_dem'];
                $login_dem = $_POST['login_dem'];
                $mdp_dem = $_POST['mdp_dem'];

                $_SESSION["demandeur"]->setNomDem($nom_dem);
                $_SESSION["demandeur"]->setPrenomDem($prenom_dem);
                $_SESSION["demandeur"]->setAdresseDem($adresse_dem);
                $_SESSION["demandeur"]->setCpDem($cp_dem);
                $_SESSION["demandeur"]->setTelephoneDem($telephone_dem);
                $_SESSION["demandeur"]->setLoginDem($login_dem);
                $_SESSION["demandeur"]->setMdpDem($mdp_dem);


                header("Location: ../V/v_profil_demandeur.php");
                exit(); 
            } else {
                echo "Erreur lors de la mise à jour. Veuillez réessayer.";
            }
        } else {
            echo "Erreur: Objet Locataire non trouvé dans la session.";
        }
    }
}
?>
