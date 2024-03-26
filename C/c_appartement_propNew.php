<?php
@session_start();
require '../M/Class Appartement.php';
require '../M/Class Proprietaire.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $type_apart = $_POST['type_apart'];
    $prix_loc = $_POST['prix_loc'];
    $prix_charges = $_POST['prix_charges'];
    $rue = $_POST['rue'];
    $arrondissement = $_POST['arrondissement'];
    $etage = $_POST['etage'];
    $elevator = $_POST['elevator'];
    $preavis = $_POST['preavis'];
    $date_libre = $_POST['date_libre'];
    $num_prop = $_SESSION['proprietaire']['num_prop'];
    $details = $_POST['details'];
    

    
        
        $appartement = new Appartement($type_apart, $prix_loc, $prix_charges, $rue, $arrondissement, $etage, $elevator, $preavis, $date_libre, $num_prop,$details);
        $insertion_reussie = $appartement->inscription();
        if ($insertion_reussie) {
            // Redirection vers la page v_annonces_visualiser_prop.php si l'insertion est réussie
            header('Location: ../V/v_annonces_prop.php');
            exit(); // Assurez-vous d'utiliser exit() après la redirection pour arrêter l'exécution du script
        }
}
?>


