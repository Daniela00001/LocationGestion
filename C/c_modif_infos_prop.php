<?php
require '../M/Modele  Proprietaire.php';

if (isset($_POST['update'])) {
    // Vérification des données reçues depuis le formulaire
    var_dump($_POST);

    // Récupération des données du formulaire
    $num_prop = $_POST['num_prop'];
    $nom = $_POST['nom_prop'] ?? '';
    $prenom = $_POST['prenom_prop'] ?? '';
    $adresse = $_POST['adresse_prop'] ?? '';
    $cp = $_POST['cp_prop'] ?? '';
    $telephone = $_POST['telephone_prop'] ?? '';
    $login = $_POST['login_prop'] ?? '';
    $mdp = $_POST['mdp_prop'] ?? '';

    // Création d'une instance de la classe Proprietaire
    $proprietaire_data = Proprietaire::getProprietaireById($num_prop);
    $proprietaire = new Proprietaire(
        $proprietaire_data['nom_prop'],
        $proprietaire_data['prenom_prop'],
        $proprietaire_data['adresse_prop'],
        $proprietaire_data['cp_prop'],
        $proprietaire_data['telephone_prop'],
        $proprietaire_data['login_prop'],
        $proprietaire_data['mdp_prop']
    );

    // Mise à jour des données du propriétaire
    $success = $proprietaire->updateInfo(
        $num_prop,
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
        $_SESSION["proprietaire"] = Proprietaire::getProprietaireById($num_prop);

        // Redirection vers la page du profil du propriétaire
        header("Location: ../V/v_profil_proprietaire.php");
        exit(); // Assurez-vous de terminer l'exécution du script après la redirection
    } else {
        echo "Erreur lors de la mise à jour. Veuillez réessayer.";
    }
}
?>
