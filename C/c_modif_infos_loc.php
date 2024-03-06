<?php
require '../M/Class Locataire.php'; // Inclure le fichier de la classe Locataire

if (isset($_POST['update'])) {
    // Récupérer les données du formulaire
    $num_loc = $_POST['num_loc'];
    $nom = $_POST['nom_loc'] ?? '';
    $prenom = $_POST['prenom_loc'] ?? '';
    $date_naissance = $_POST['date_naissance'] ?? '';
    $telephone = $_POST['telephone_loc'] ?? '';
    $numCompt_loc = $_POST['numCompt_loc'] ?? '';
    $banque = $_POST['banque'] ?? '';
    $adresse_banque = $_POST['adresse_banque_loc'] ?? '';
    $cp_banque = $_POST['cp_banque_loc'] ?? '';
    $login = $_POST['login_loc'] ?? '';
    $mdp = $_POST['mdp_loc'] ?? '';
    $locataire_data = Locataire::getLocataireById($num_loc);

    // Créer un objet Locataire avec les données existantes
    $locataire = new Locataire(
        $locataire_data->getNomLoc(),
        $locataire_data->getPrenomLoc(),
        $locataire_data->getDateNaissance(),
        $locataire_data->getTelephoneLoc(),
        $locataire_data->getNumComptLoc(),
        $locataire_data->getBanque(),
        $locataire_data->getAdresseBanqueLoc(),
        $locataire_data->getCpBanqueLoc(),
        $locataire_data->getLoginLoc(),
        $locataire_data->getMdpLoc(),
        $locataire_data->getNumApart()
    );

    // Mettre à jour les propriétés avec les nouvelles valeurs
    $locataire->setNumLoc($num_loc);
    $locataire->setNomLoc($nom);
    $locataire->setPrenomLoc($prenom);
    $locataire->setDateNaissance($date_naissance);
    $locataire->setTelephoneLoc($telephone);
    $locataire->setNumComptLoc($numCompt_loc);
    $locataire->setBanque($banque);
    $locataire->setAdresseBanqueLoc($adresse_banque);
    $locataire->setCpBanqueLoc($cp_banque);
    $locataire->setLoginLoc($login);
    $locataire->setMdpLoc($mdp);

    // Appeler la méthode d'updateInfo pour mettre à jour les informations dans la base de données
    $success = $locataire->updateInfo();

    if ($success) {
        echo "Mise à jour réussie!";

        // Actions supplémentaires après la mise à jour réussie
        // Exemple : Destruction de la session
        session_destroy();

        // Réinitialisation de la session avec les nouvelles données du locataire
        session_start();
        $_SESSION["locataire"] = Locataire::getLocataireById($num_loc);

        // Redirection vers la page du profil du locataire
        header("Location: ../V/v_profil_locataire.php");
        exit(); // Assurez-vous de terminer l'exécution du script après la redirection
    } else {
        echo "Erreur lors de la mise à jour. Veuillez réessayer.";
    }
}
?>