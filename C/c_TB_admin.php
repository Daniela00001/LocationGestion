<?php
require_once '../M/Class Appartement.php';
require_once '../M/Class Demande.php';

$appartement = new Appartement(); // Instanciation de la classe Appartement
$annonces = $appartement->recupAppart(); // Appel de la méthode recupAppart()


$demande = new Demande(); // Instanciation de la classe Appartement
$demandes = $demande->recupDemande(); // Appel de la méthode recupAppart()

// Le reste de votre code
?>
