<?php
require_once '../C/c_TB_admin.php'; // Assurez-vous de mettre le bon chemin vers votre contrôleur
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des appartements</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styleSessionDem.css">
</head>
<body>
    
<nav>
    <div class="navbar">
        <a href="v_espace_admin.php">Tableau de Bord</a>
    </div>
</nav>
<header class="header-container">
    <img src="images/wsfgsr.png" alt="En-tête du site" class="header-image_index" width="100%" height="250px">
</header>

<h1>Liste des appartements</h1>
<table>
    <thead>
        <tr>
            <th>Numéro</th>
            <th>Type</th>
            <th>Prix Location</th>
            <th>Prix Charges</th>
            <th>Rue</th>
            <th>Arrondissement</th>
            <th>Étage</th>
            <th>Ascenseur</th>
            <th>Préavis</th>
            <th>Date Libre</th>
            <th>Numéro Propriétaire</th>
            <th>Détails</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($annonces as $annonce): ?>
            <tr>
                <td><?= $annonce['num_apart'] ?></td>
                <td><?= $annonce['type_apart'] ?></td>
                <td><?= $annonce['prix_loc'] ?></td>
                <td><?= $annonce['prix_charges'] ?></td>
                <td><?= $annonce['rue'] ?></td>
                <td><?= $annonce['arrondissement'] ?></td>
                <td><?= $annonce['etage'] ?></td>
                <td><?= $annonce['elevator'] ?></td>
                <td><?= $annonce['preavis'] ?></td>
                <td><?= $annonce['date_libre'] ?></td>
                <td><?= $annonce['num_prop'] ?></td>
                <td><?= $annonce['details'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



















<h1>Liste des demandes</h1>
<table>
    <thead>
        <tr>
            <th>ID_demande</th>
            <th>Type</th>
            <th>Prix Location</th>
            <th>Prix Charges</th>
            <th>Rue</th>
            <th>Arrondissement</th>
            <th>Étage</th>
            <th>Ascenseur</th>
            <th>Préavis</th>
            <th>Date Libre</th>
            <th>Numéro Propriétaire</th>
            <th>Détails</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($annonces as $annonce): ?>
            <tr>
                <td><?= $annonce['num_apart'] ?></td>
                <td><?= $annonce['type_apart'] ?></td>
                <td><?= $annonce['prix_loc'] ?></td>
                <td><?= $annonce['prix_charges'] ?></td>
                <td><?= $annonce['rue'] ?></td>
                <td><?= $annonce['arrondissement'] ?></td>
                <td><?= $annonce['etage'] ?></td>
                <td><?= $annonce['elevator'] ?></td>
                <td><?= $annonce['preavis'] ?></td>
                <td><?= $annonce['date_libre'] ?></td>
                <td><?= $annonce['num_prop'] ?></td>
                <td><?= $annonce['details'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
