<?php
require '../M/Class Demandeur.php';

// Vérifie si le formulaire de mise à jour est soumis
if (isset($_POST['update'])) {
    // Récupère les données du formulaire
    $num_dem = $_POST['num_dem'];
    $nom = $_POST['nom_dem'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $adresse = $_POST['adresse'] ?? '';
    $cp = $_POST['cp'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $login = $_POST['login'] ?? '';
    $mdp = $_POST['mdp'] ?? '';

    // Récupère les informations actuelles du demandeur en fonction de son numéro
    $demandeur_data = Demandeur::getDemandeurById($num_dem);

    // Crée une instance de la classe Demandeur avec les informations actuelles
    $demandeur = new Demandeur(
        $demandeur_data['nom_dem'],
        $demandeur_data['prenom_dem'],
        $demandeur_data['adresse_dem'],
        $demandeur_data['cp_dem'],
        $demandeur_data['telephone_dem'],
        $demandeur_data['login_dem'],
        $demandeur_data['mdp_dem']
    );
    
    // Met à jour les propriétés de l'instance avec les nouvelles valeurs
    $demandeur->setNumDem($num_dem);
    $demandeur->setNomDem($nom);
    $demandeur->setPrenomDem($prenom);
    $demandeur->setAdresseDem($adresse);
    $demandeur->setCpDem($cp);
    $demandeur->setTelephoneDem($telephone);
    $demandeur->setLoginDem($login);
    $demandeur->setMdpDem($mdp);
    
    // Appelle la méthode pour mettre à jour les informations du demandeur
    $success = $demandeur->updateInfo();

    if ($success) {
        // Mise à jour réussie
        echo "Mise à jour réussie!";
    
        // Détruit la session actuelle
        session_destroy();
    
        // Réinitialise la session avec les nouvelles données du demandeur
        session_start();
        $_SESSION["demandeur"] = Demandeur::getDemandeurById($num_dem);
    
        // Redirige vers la page du profil
        header("Location: ../V/v_profil_demandeur.php");
        exit(); // Assurez-vous de terminer l'exécution du script après la redirection
    } else {
        // Erreur lors de la mise à jour
        echo "Erreur lors de la mise à jour. Veuillez réessayer.";
    }
    
}
?>

