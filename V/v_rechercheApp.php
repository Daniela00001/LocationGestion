

<?php
include 'v_espace_demandeur.php';

// Vérifier si des annonces sont disponibles dans l'URL
if(isset($_GET["annonces"])) {
    // Désérialiser les résultats de recherche
    $annonces = unserialize($_GET["annonces"]);
    
    // Vérifier si des annonces ont été trouvées
    if (!empty($annonces)) {
        echo "<div class='annonce-container'>";
        echo "<h3>Appartements disponibles à la location</h3>";
        // Parcourir les annonces et les afficher
        foreach ($annonces as $appartement) {
            echo "<div class='annonce'>";
            echo "<p>Arrondissement: " . $appartement['arrondissement'] . "</p>";
            echo "<p>Type: " . $appartement['type_apart'] . "</p>";
            echo "<p>Prix de location: " . $appartement['prix_loc'] . "</p>";
            echo "<p>Prix des charges: " . $appartement['prix_charges'] . "</p>";
            echo "<p>Rue: " . $appartement['rue'] . "</p>";
            echo "<p>Étage: " . $appartement['etage'] . "</p>";
            echo "<p>Ascenseur: " . ($appartement['elevator'] ? 'Oui' : 'Non') . "</p>";
            echo "<p>Préavis: " . $appartement['preavis'] . "</p>";
            echo "<p>Date disponible: " . $appartement['date_libre'] . "</p>";
            echo "</div>";
        
        }
        echo "</div>";
    } else {
        // Aucune annonce trouvée
        echo "<h3>Aucun appartement trouvé pour ce type.</h3>";
    }
} else {
    // Aucune donnée d'annonce n'a été transmise
    echo "<h3>Aucune annonce trouvée.</h3>";
}
?>
<style>
   
   .annonce {
       background-color: beige;
       border-radius: 5px;
       padding: 20px;
       margin-bottom: 20px;
     
   }

   .annonce-container p {
       margin: 5px 0;
       color: black;
       width: 20%;
   }

   .annonce-container h3 {
       margin-top: 0;
       color: black;
   }
</style>