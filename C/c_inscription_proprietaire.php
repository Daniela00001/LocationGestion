<?php
require '../M/Class Proprietaire.php'; // Inclut le fichier contenant la classe Proprietaire

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
    $proprietaire->inscription();
    try {
        // Tente d'effectuer l'inscription du propriétaire en appelant la méthode "inscription()"
      

        // Redirige vers une page de confirmation si l'inscription est réussie
        header("Location: ../V/v_confirmation_inscription.php");
        exit(); // Arrête l'exécution du script après la redirection
    } catch (PDOException $e) {
        // Capture une éventuelle erreur et affiche un message d'erreur
        echo "Erreur lors de l'inscription : " . $e->getMessage();
    }
}
?>
