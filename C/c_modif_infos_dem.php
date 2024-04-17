<?php
require '../M/Modele  Demandeur.php';

if (isset($_POST['update'])) {
    // Vérification des données reçues depuis le formulaire
    var_dump($_POST);

    // Récupération des données du formulaire
    $num_dem = $_POST['num_dem'];
    $nom = $_POST['nom_dem'] ?? '';
    $prenom = $_POST['prenom_dem'] ?? '';
    $adresse = $_POST['adresse_dem'] ?? '';
    $cp = $_POST['cp_dem'] ?? '';
    $telephone = $_POST['telephone_dem'] ?? '';
    $login = $_POST['login_dem'] ?? '';
    $mdp = $_POST['mdp_dem'] ?? '';

    // Création d'une instance de la classe Proprietaire
    $demandeur_data = Demandeur::getDemandeurById($num_dem);
    $demandeur = new Demandeur(
        $demandeur_data['nom_dem'],
        $demandeur_data['prenom_dem'],
        $demandeur_data['adresse_dem'],
        $demandeur_data['cp_dem'],
        $demandeur_data['telephone_dem'],
        $demandeur_data['login_dem'],
        $demandeur_data['mdp_dem']
    );

    // Mise à jour des données du propriétaire
    $success = $demandeur->updateInfo(
        $num_dem,
        $nom,
        $prenom,
        $adresse,
        $cp,
        $telephone,
        $login,
        $mdp
    );

    // Vérification si la mise à jour a réussi
    if ($success) {
        echo "Mise à jour réussie!";

        session_destroy();
        session_start();
        $_SESSION["demandeur"] = Demandeur::getDemandeurById($num_dem);

        // Redirection vers la page du profil du propriétaire
        header("Location: ../V/v_profil_demandeur.php");
        exit(); // Assurez-vous de terminer l'exécution du script après la redirection
    } else {
        echo "Erreur lors de la mise à jour. Veuillez réessayer.";
    }
}
?>
