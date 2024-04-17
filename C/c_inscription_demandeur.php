<?php
require '../M/Modele  Demandeur.php'; // Inclut le fichier contenant la classe Demandeur

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifie que la requête est de type POST

    // Récupère les données du formulaire
    $nom_dem = $_POST['nom_dem'];
    $prenom_dem = $_POST['prenom_dem'];
    $adresse_dem = $_POST['adresse_dem'];
    $cp_dem = $_POST['cp_dem'];
    $telephone_dem = $_POST['telephone_dem'];
    $login_dem = $_POST['login_dem'];
    $mdp_dem = $_POST['mdp_dem']; 

    // Crée une nouvelle instance de la classe Demandeur avec les données du formulaire
    $demandeur = new Demandeur($nom_dem, $prenom_dem, $adresse_dem, $cp_dem, $telephone_dem, $login_dem, $mdp_dem);
    

    try {
        // Tente d'effectuer l'inscription du demandeur en appelant la méthode "inscription()"
        $demandeur->inscription();
        header("Location: ../V/v_confirmation_inscriptionD.php");
        
        exit(); // Arrête l'exécution du script après la redirection
    } catch (PDOException $e) {
        // Capture une éventuelle erreur et affiche un message d'erreur
        echo "Erreur lors de l'inscription : " . $e->getMessage();
    }
}
?>