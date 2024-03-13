<?php
require '../M/Class Proprietaire.php';

if (isset($_POST['update'])) {
    $num_prop = $_POST['num_prop'];
    $nom = $_POST['nom_prop'] ?? '';
    $prenom = $_POST['prenom_prop'] ?? '';
    $adresse = $_POST['adresse_prop'] ?? '';
    $cp = $_POST['cp_prop'] ?? '';
    $telephone = $_POST['telephone_prop'] ?? '';
    $login = $_POST['login_prop'] ?? '';
    $mdp = $_POST['mdp_prop'] ?? '';

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

    $proprietaire->setNumProp($num_prop);
    $proprietaire->setNomProp($nom);
    $proprietaire->setPrenomProp($prenom);
    $proprietaire->setAdresseProp($adresse);
    $proprietaire->setCpProp($cp);
    $proprietaire->setTelephoneProp($telephone);
    $proprietaire->setLoginProp($login);
    $proprietaire->setMdpProp($mdp);

    $success = $proprietaire->updateInfo();

    if ($success) {
        echo "Mise à jour réussie!";

        // Actions supplémentaires après la mise à jour réussie
        // Exemple : Destruction de la session
        session_destroy();

        // Réinitialisation de la session avec les nouvelles données du propriétaire
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
