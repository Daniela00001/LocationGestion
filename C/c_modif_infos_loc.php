<?php




require '../M/Class Locataire.php';
if (isset($_POST['update'])) {
    // Vérification des données reçues depuis le formulaire
    var_dump($_POST);

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

$locataire_data = Locataire::getLocataireById($num_loc);
$locataire = new Locataire(
    $locataire_data['nom_loc'],
    $locataire_data['prenom_loc'],
    $locataire_data['date_naissance'],
    $locataire_data['telephone_loc'],
    $locataire_data['numCompt_loc'],
    $locataire_data['banque'],
    $locataire_data['adresse_banque_loc'],
    $locataire_data['cp_banque_loc'],
    $locataire_data['login_loc'],
    $locataire_data['mdp_loc']
);



// Appel de la fonction pour mettre à jour les informations du locataire
$success = $locataire->updateInfo(
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

 
if ($success) {
    echo "Mise à jour réussie!";

    session_destroy();
    session_start();
    $_SESSION["locataire"] = Locataire::getLocataireById($num_loc);

    // Redirection vers la page du profil du propriétaire
    header("Location: ../V/v_profil_locataire.php");
    exit(); // Assurez-vous de terminer l'exécution du script après la redirection
} else {
    echo "Erreur lors de la mise à jour. Veuillez réessayer.";
}
}

?>