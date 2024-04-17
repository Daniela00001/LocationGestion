<?php
@session_start();
require '../M/Modele  Proprietaire.php'; // Assurez-vous que le chemin d'accès au fichier est correct

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $cp = $_POST['cp'];
    $telephone = $_POST['telephone'];
    $login = $_POST['login'];
    $mdp = $_POST['mdp']; 

    // Crée une nouvelle instance de la classe Proprietaire avec les données du formulaire
    $proprietaire = new Proprietaire($nom, $prenom, $adresse, $cp, $telephone, $login, $mdp);

    // Vérifie si le login existe déjà
    $existeDeja = $proprietaire->verifierProprietaire($login, $mdp);
    if ($existeDeja) {
        // Si le login existe déjà, définissez un message d'erreur approprié
        $_SESSION['erreur'] = "Ce login est déjà utilisé. Veuillez en choisir un autre.";
        // Redirigez vers la page du formulaire avec un message d'erreur
        header("Location: ../V/v_inscriptionP.php");
        exit(); // Arrête l'exécution du script après la redirection
    }

    try {
        // Tente d'effectuer l'inscription du propriétaire en appelant la méthode "inscription()"
        $proprietaire->inscription();

        // Redirige vers une page de confirmation si l'inscription est réussie
        header("Location: ../V/v_confirmation_inscriptionP.php");
        exit(); // Arrête l'exécution du script après la redirection
    } catch (PDOException $e) {
        // Capture une éventuelle erreur et affiche un message d'erreur
        echo "Erreur lors de l'inscription : " . $e->getMessage();
    }
}
?>
