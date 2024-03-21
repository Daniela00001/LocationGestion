<?php
require '../M/Class Locataire.php';

if (isset($_POST['update'])) {
    $num_loc = $_POST['num_loc'];
    $nom_loc = $_POST['nom_loc'] ?? '';
    $prenom_loc = $_POST['prenom_loc'] ?? '';
    $date_naissance = $_POST['date_naissance'] ?? '';
    $telephone_loc = $_POST['telephone_loc'] ?? '';
    $numCompt_loc = $_POST['numCompt_loc'] ?? '';
    $banque = $_POST['banque'] ?? '';
    $adresse_banque_loc = $_POST['adresse_banque_loc'] ?? '';
    $cp_banque_loc = $_POST['cp_banque_loc'] ?? '';
    $login_loc = $_POST['login_loc'] ?? '';
    $mdp_loc = $_POST['mdp_loc'] ?? '';
    

    // Création d'une instance de Locataire avec les nouvelles données
    $locataire = new Locataire(
        $num_loc,
        $nom_loc,
        $prenom_loc,
        $date_naissance,
        $telephone_loc,
        $numCompt_loc,
        $banque,
        $adresse_banque_loc,
        $cp_banque_loc,
        $login_loc,
        $mdp_loc
    );
 
    // Appel de la fonction pour mettre à jour les informations du locataire
    $success = $locataire->updateInfo();

    if ($success) {
        echo "Mise à jour réussie!";

        // Mettre à jour les données du locataire dans la session
        $_SESSION["locataire"] = [
            'num_loc' => $num_loc,
            'nom_loc' => $nom_loc,
            'prenom_loc' => $prenom_loc,
            'date_naissance' => $date_naissance,
            'telephone_loc' => $telephone_loc,
            'numCompt_loc' => $numCompt_loc,
            'banque' => $banque,
            'adresse_banque_loc' => $adresse_banque_loc,
            'cp_banque_loc' => $cp_banque_loc,
            'login_loc' => $login_loc,
            'mdp_loc' => $mdp_loc
        ];

        // Redirection vers la page du profil du locataire
        header("Location: ../V/v_profil_locataire.php");
        exit(); // Assurez-vous de terminer l'exécution du script après la redirection
    } else {
        echo "Erreur lors de la mise à jour. Veuillez réessayer.";
    }
}
?>
