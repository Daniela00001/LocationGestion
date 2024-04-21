<?php
require_once '../M/Modele  Appartement.php';
@session_start();
$appartement = new Appartement();
$annonces = $appartement->getAllAnnonces();

?>
