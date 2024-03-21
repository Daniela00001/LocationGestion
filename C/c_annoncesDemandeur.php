<?php
require_once '../M/Class Appartement.php';
@session_start();
$appartement = new Appartement();
$annonces = $appartement->getAllAnnonces();


?>
