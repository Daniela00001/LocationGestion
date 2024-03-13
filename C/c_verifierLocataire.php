<?php
require '../C/param_connexion_BdD.php';

// Vérification si l'utilisateur est déjà locataire
$query = "CALL VerifierLocataire(:num_dem, @message)";
$stmt = $conn->prepare($query);
$stmt->bindParam(':num_dem', $demandeur['num_dem']);
$stmt->execute();

// Récupération du message renvoyé par la procédure stockée
$result = $conn->query("SELECT @message AS message")->fetch(PDO::FETCH_ASSOC);
$message = $result['message'];

// Affichage du message à l'utilisateur
echo $message;
?>
