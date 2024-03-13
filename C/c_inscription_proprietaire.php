<?php
session_start(); // Démarre la session si ce n'est pas déjà fait
require '../M/Class Proprietaire.php'; // Inclut le fichier contenant la classe Proprietaire

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $cp = $_POST['cp'];
    $telephone = $_POST['telephone'];
    $login = $_POST['login'];
    $mdp = $_POST['mdp']; 

    // Vérifier si le login existe déjà
    if (Proprietaire::loginExiste($login)) {
        // Stocker le message d'erreur dans une variable de session
        $_SESSION['erreur'] = "Le login est déjà utilisé. Veuillez en choisir un autre.";
        
        // Rediriger vers la page précédente pour afficher le formulaire avec le message d'erreur
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit;
    }

    // Le login est unique, procéder à l'inscription
    $proprietaire = new Proprietaire($nom, $prenom, $adresse, $cp, $telephone, $login, $mdp);
    
    try {
        // Tente d'effectuer l'inscription du propriétaire en appelant la méthode "inscription()"
        $proprietaire->inscription();

       
        header("Location: ../V/v_confirmation_inscriptionP.php");
        exit(); // Arrête l'exécution du script après la redirection
    } catch (PDOException $e) {
        // Capture une éventuelle erreur et stocke le message d'erreur dans une variable de session
        $_SESSION['erreur'] = "Erreur lors de l'inscription : " . $e->getMessage();
        
        // Rediriger vers la page précédente pour afficher le formulaire avec le message d'erreur
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit;
    }
}
?>
