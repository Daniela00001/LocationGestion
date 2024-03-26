<?php
$host = "localhost"; // Adresse de l'hôte de la base de données
$dbname = "basegestionlocations"; // Nom de la base de données
$username = "root"; // Nom d'utilisateur de la base de données
$password = ""; // Mot de passe de la base de données

try {
    // Crée une nouvelle connexion PDO avec les informations de connexion
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Configure PDO pour déclencher des exceptions en cas d'erreur
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'erreur lors de la connexion, capture l'exception et affiche un message d'erreur
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

?>
