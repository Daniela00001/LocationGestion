<?php
require '../M/Modele  Locataire.php';

session_start();

if (isset($_POST['update'])) {
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

        if(isset($_SESSION["locataire"]) && is_object($_SESSION["locataire"])) {
            $locataire = $_SESSION["locataire"];

            $success = $locataire->updateInfo($nom_loc, $prenom_loc, $date_naissance, $telephone_loc, $numCompt_loc, $banque, $adresse_banque_loc, $cp_banque_loc, $login_loc, $mdp_loc, $num_loc);

            if ($success) {
                echo "Mise à jour réussie!";

                $nom_loc = $_POST['nom_loc'];
                $prenom_loc = $_POST['prenom_loc'];
                $date_naissance = $_POST['date_naissance'];
                $telephone_loc = $_POST['telephone_loc'];
                $numCompt_loc = $_POST['numCompt_loc'];
                $banque = $_POST['banque'];
                $adresse_banque_loc = $_POST['adresse_banque_loc'];
                $cp_banque_loc = $_POST['cp_banque_loc'];
                $login_loc = $_POST['login_loc'];


                $_SESSION["locataire"]->setNomLoc($nom_loc);
                $_SESSION["locataire"]->setPrenomLoc($prenom_loc);
                $_SESSION["locataire"]->setDateNaissance($date_naissance);
                $_SESSION["locataire"]->setTelephoneLoc($telephone_loc);
                $_SESSION["locataire"]->setNumComptLoc($numCompt_loc);
                $_SESSION["locataire"]->setBanque($banque);
                $_SESSION["locataire"]->setAdresseBanqueLoc($adresse_banque_loc);
                $_SESSION["locataire"]->setCpBanqueLoc($cp_banque_loc);
                $_SESSION["locataire"]->setLoginLoc($login_loc);

                header("Location: ../V/v_profil_locataire.php");
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
