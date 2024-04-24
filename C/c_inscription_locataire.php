<?php
require '../M/Modele  Locataire.php';
require '../M/Modele  Demande.php';

@session_start();

// Vérifier si la requête est de type POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si toutes les données du formulaire sont présentes
    if (isset($_POST['nom_loc'], $_POST['prenom_loc'], $_POST['date_naissance'], $_POST['telephone_loc'], $_POST['numCompt_loc'], $_POST['banque'], $_POST['adresse_banque_loc'], $_POST['cp_banque_loc'], $_POST['login_loc'], $_POST['mdp_loc'], $_POST['num_apart'], $_POST['num_dem'])) {
        // Récupérer les données du formulaire
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

        // Créer une instance de la classe Locataire
        $locataire = new Locataire($nom_loc, $prenom_loc, $date_naissance, $telephone_loc, $numCompt_loc, $banque, $adresse_banque_loc, $cp_banque_loc, $login_loc, $mdp_loc, $num_apart, $num_dem);
        
        // Vérification si le demandeur existe déjà en tant que locataire
        if (Locataire::verifierLocataire($login_loc, $mdp_loc)) {
            // Redirection vers une autre page si le locataire existe déjà
            header("Location: ../V/v_locataire_existe_deja.php");
            exit(); // Arrête l'exécution du script après la redirection
        } else {
            try {
                // Tenter d'effectuer l'inscription du locataire en appelant la méthode "inscription()"
                $locataire->inscription();

                // Rediriger vers une page de confirmation si l'inscription est réussie
                header("Location: ../V/v_confirmation_inscriptionL.php");
                exit(); // Arrêter l'exécution du script après la redirection
            } catch (PDOException $e) {
                // Capturer une éventuelle erreur et stocker un message d'erreur dans la session
                $_SESSION['erreur'] = "Erreur lors de l'inscription : " . $e->getMessage();
                // Redirection vers une page d'erreur
                header("Location: ../V/v_erreur.php");
                exit(); // Arrêter l'exécution du script après la redirection
            }
        }
    }
}
?>
