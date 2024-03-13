<?php 
include 'v_espace_locataire.php'; 
include '../C/c_contratLoc.php'; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Informations Locataire et Appartement</title>
</head>
<body>
    <h1>Informations Locataire et Appartement</h1>

    <?php foreach ($infos_locataire_appartement as $info) : ?>
        <div>
            <h2>Informations du Proprietaire</h2>
            <p>Numéro du  proprietaire : <?php echo $info['num_prop']; ?></p>
            
 
            <p>Nom : <?php echo $info['nom_prop']; ?></p>
            <p>Prénom : <?php echo $info['prenom_prop']; ?></p>

            <p>Telephone<?php echo $info['telephone_prop']; ?></p>
           
            
            <h2>Informations de l'Appartement</h2>

            <p>Numéro de l'appartement : <?php echo $info['num_apart']; ?></p>
            <p>Type : <?php echo $info['type_apart']; ?></p>
            <p>Prix location : <?php echo $info['prix_loc']; ?></p>
            <p>Prix charges : <?php echo $info['prix_charges']; ?></p>
            <p>Rue : <?php echo $info['rue']; ?></p>
            <p>Arrondissement : <?php echo $info['arrondissement']; ?></p>
            <p>Etage : <?php echo $info['etage']; ?></p>
            <p>Elevator : <?php echo $info['elevator']; ?></p>
            <p>Preavis : <?php echo $info['preavis']; ?></p>
            <p>Total à payer chaque mois : <?php echo $total_a_payer; ?></p>

   
        </div>
    <?php endforeach; ?>
</body>
</html>
