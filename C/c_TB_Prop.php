<?php
require '../M/Modele  Locataire.php'; // Assurez-vous d'inclure la classe Locataire

@session_start();
$proprietaire = $_SESSION["proprietaire"];

// Accédez aux propriétés de l'objet $proprietaire avec l'opérateur ->
$total = Locataire::getTotauxMensuelsParAppartement($proprietaire->getNumProp());

$totalProp = Locataire::getTotalMensuelProprietaire($proprietaire->getNumProp());

$demandes = Locataire::getDemandesProprietaireLouer($proprietaire->getNumProp());

?>
