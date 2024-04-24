<?php
require '../M/Modele  Proprietaire.php';

session_start();

if (isset($_POST['update'])) {
    if (isset($_POST['nom_prop'], $_POST['prenom_prop'], $_POST['adresse_prop'], $_POST['cp_prop'], $_POST['telephone_prop'], $_POST['login_prop'], $_POST['mdp_prop'])) {
   $nom_prop= $_POST['nom_prop'] ?? '';
   $prenom_prop= $_POST['nom_prop'] ?? '';
   $adresse_prop= $_POST['adresse_prop'] ?? '';
   $cp_prop= $_POST['cp_prop'] ?? '';
   $telephone_prop = $_POST['telephone_prop'] ?? '';
   $login_prop = $_POST['login_prop'] ?? '';
   $mdp_prop = $_POST['mdp_prop'] ?? '';

    if(isset($_SESSION["proprietaire"]) && is_object($_SESSION["proprietaire"])) {
        $proprietaire = $_SESSION["proprietaire"];

        $success = $proprietaire->updateInfo($num_prop, $nom_prop, $prenom_prop, $adresse_prop, $cp_prop, $telephone_prop, $login_prop, $mdp_prop);
        if ($success) {
            echo "Mise à jour réussie!";

           $nom_prop= $_POST['nom_prop'];
           $prenom_prop= $_POST['prenom_prop'];
           $adresse_prop= $_POST['adresse_prop'];
           $cp_prop= $_POST['cp_prop'];
           $telephone_prop = $_POST['telephone_prop'];
           $login_prop = $_POST['login_prop'];
           $mdp_prop = $_POST['mdp_prop'];

   
            $_SESSION["proprietaire"]->setNomProp($nom_prop);
            $_SESSION["proprietaire"]->setPrenomProp($prenom_prop);
            $_SESSION["proprietaire"]->setAdresseProp($adresse_prop);
            $_SESSION["proprietaire"]->setCpProp($cp_prop);
            $_SESSION["proprietaire"]->setTelephoneProp($telephone_prop);
            $_SESSION["proprietaire"]->setLoginProp($login_prop);
            $_SESSION["proprietaire"]->setMdpProp($mdp_prop);

            // Redirection vers la page du profil du propriétaire
            header("Location: ../V/v_profil_proprietaire.php");
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
