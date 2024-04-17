<?php
// Assurez-vous de démarrer la session au début de votre script
session_start();

require_once '../M/Modele  Appartement.php'; // Assurez-vous que le nom de votre classe est correct
require_once '../M/Modele  Proprietaire.php'; // Assurez-vous que le nom de votre classe est correct

// Vérifiez si la méthode de requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifiez si une action a été envoyée
    if (isset($_POST['action'])) {
        // Si l'action est d'ajouter un appartement
        if ($_POST['action'] === 'ajouter_appartement') {
            // Récupérez les données du formulaire
            $type_apart = $_POST['type_apart'];
            $prix_loc = $_POST['prix_loc'];
            $prix_charges = $_POST['prix_charges'];
            $rue = $_POST['rue'];
            $arrondissement = $_POST['arrondissement'];
            $etage = $_POST['etage'];
            $elevator = $_POST['elevator'];
            $preavis = $_POST['preavis'];
            $date_libre = $_POST['date_libre'];
            $details = $_POST['details'];
            // Instanciez un nouvel objet Appartement avec toutes les données
            $appartement = new Appartement($type_apart, $prix_loc, $prix_charges, $rue, $arrondissement, $etage, $elevator, $preavis, $date_libre, $details);

            // Ajoutez l'appartement à la base de données
            $insertion_reussie = $appartement->inscription();

            if ($insertion_reussie) {
                header('Location: ../V/v_annonces_prop.php');
                exit();
            }
        } elseif ($_POST['action'] === 'supprimer_appartement') {
            // Si l'action est de supprimer un appartement
            $num_apart = $_POST['num_apart'];

            // Instanciez un nouvel objet Appartement
            $appartement = new Appartement();

            // Supprimez l'appartement de la base de données
            $suppression_reussie = $appartement->supprimerAppartement($num_apart);

            if ($suppression_reussie) {
                header('Location: ../V/v_annonces_prop.php');
                exit();
            } 
        } elseif ($_POST['action'] === 'modifier_appartement') {
            // Si l'action est de modifier un appartement
            $num_apart = $_POST['num_apart'];

            // Récupérez les données du formulaire
            $type_apart = $_POST['type_apart'];
            $prix_loc = $_POST['prix_loc'];
            $prix_charges = $_POST['prix_charges'];
            $rue = $_POST['rue'];
            $arrondissement = $_POST['arrondissement'];
            $etage = $_POST['etage'];
            $elevator = $_POST['elevator'];
            $preavis = $_POST['preavis'];
            $date_libre = $_POST['date_libre'];
            $details = $_POST['details'];

            // Instanciez un nouvel objet Appartement
            $appartement = new Appartement();

            // Modifiez l'appartement dans la base de données
            $modification_reussie = $appartement->modifierAppartement($num_apart, $type_apart, $prix_loc, $prix_charges, $rue, $arrondissement, $etage, $elevator, $preavis, $date_libre, $details);

                header('Location: ../V/v_annonces_prop.php');
                exit();
            } 
        }
    }

?>
