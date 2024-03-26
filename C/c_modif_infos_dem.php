<?php
require '../M/Class Demandeur.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification de l'action à effectuer
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'modifierDemandeur') {
            // Vérification de la présence du numéro du demandeur à supprimer
           
            if (isset($_POST['num_dem'], $_POST['nom_dem'], $_POST['prenom_dem'], $_POST['adresse_dem'], $_POST['cp_dem'], $_POST['telephone_dem'], $_POST['login_dem'], $_POST['mdp_dem'])) {
                // Récupération des données du formulaire
                $num_dem = $_POST['num_dem'];
                $nom_dem = $_POST['nom_dem'];
                $prenom_dem = $_POST['prenom_dem'];
                $adresse_dem = $_POST['adresse_dem'];
                $cp_dem = $_POST['cp_dem'];
                $telephone_dem = $_POST['telephone_dem'];
                $login_dem = $_POST['login_dem'];
                $mdp_dem = $_POST['mdp_dem'];

                // Modification du demandeur avec les données spécifiées
                $success = $demandeur->updateInfo($num_dem, $nom_dem, $prenom_dem, $adresse_dem, $cp_dem, $telephone_dem, $login_dem, $mdp_dem);

                if ($success) {
                    // Redirection vers la même page après la modification réussie
                    header("Location: ../V/v_espace_admin.php");
                    exit;
                } else {
                    // Gestion de l'échec de modification
                    echo "Une erreur s'est produite lors de la modification du demandeur.";
                }
            } else {
                // Données manquantes pour la modification
                echo "Certaines données nécessaires pour la modification du demandeur sont manquantes.";
            }
        }
    }
}
