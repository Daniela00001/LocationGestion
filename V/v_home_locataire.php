<?php 
include 'v_espace_locataire.php'; 
include '../C/c_contratLoc.php'; 

@session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Informations Proprietaire et Appartement</title>
    <link rel="stylesheet" href="CSS/styleSessionLoc.css">
</head>
<body>
    <div class="container">
        <h1>Informations Proprietaire et Appartement</h1>

        <?php foreach ($infos_locataire_appartement as $info) : ?>
            <div class="info-box">
                <h2>Informations du Proprietaire</h2>
                <p class="prop-info">Nom : <?php echo $info['nom_prop']; ?></p>
                <p class="prop-info">Prénom : <?php echo $info['prenom_prop']; ?></p>
                <p class="prop-info">Téléphone : <?php echo $info['telephone_prop']; ?></p>
                
                <h2>Informations de l'Appartement</h2>
                <p class="apart-info">Type : <?php echo $info['type_apart']; ?></p>
                <p class="apart-info">Prix location : <?php echo $info['prix_loc']; ?></p>
                <p class="apart-info">Prix charges : <?php echo $info['prix_charges']; ?></p>
                <p class="apart-info">Rue : <?php echo $info['rue']; ?></p>
                <p class="apart-info">Arrondissement : <?php echo $info['arrondissement']; ?></p>
                <p class="apart-info">Étage : <?php echo $info['etage']; ?></p>
                <p class="apart-info">Élévateur : <?php echo $info['elevator']; ?></p>
                <p class="apart-info">Préavis : <?php echo $info['preavis']; ?></p>
                <p class="total">Total à payer chaque mois : <?php echo $total_a_payer['total']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
<style>/* CSS/styleSessionLoc.css */

/* CSS/styleSessionLoc.css */

/* Style pour le conteneur principal */
.container {
    max-width: 800px;
    margin: 20px auto;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Style pour les boîtes d'informations */
.info-box {
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 20px;
    background-color: #fff;
}

/* Style pour les titres */
h1, h2 {
    color: #333;
}

/* Style pour les informations du propriétaire */
.prop-info, .apart-info {
    color: #666;
    margin-bottom: 5px;
}

/* Style pour le total à payer */
.total {
    font-weight: bold;
    color: #007bff; /* couleur bleue */
}

</style>