<?php
require '../M/Class Locataire.php'; // Assurez-vous d'inclure la classe Locataire
@session_start();
$proprietaire = $_SESSION["proprietaire"];



$total = Locataire::getTotauxMensuelsParAppartement($proprietaire['num_prop']);

$totalProp = Locataire::getTotalMensuelProprietaire($proprietaire['num_prop']);


$demandes = Locataire::getDemandesProprietaireLouer($proprietaire['num_prop']);



?>
