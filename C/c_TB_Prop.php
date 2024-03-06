<?php
require '../M/Class Demande.php';

$proprietaire = $_SESSION["proprietaire"];


$totaux_par_appartement = DemandeLocation::getTotauxMensuelsParAppartement($proprietaire['num_prop']);

$total_mensuel = DemandeLocation::getTotalMensuelProprietaire($proprietaire['num_prop']);

$demandes = DemandeLocation::getDemandesProprietaireLouer($proprietaire['num_prop']);



?>
