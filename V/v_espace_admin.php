<?php
require_once '../C/c_TB_admin.php'; // Assurez-vous de mettre le bon chemin vers votre contrôleur
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des appartements</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styleSessionAD.css">
   
</head>
<body>
    
<nav class="navbar">
    <a href="v_espace_admin.php">Tableau de Bord</a>
</nav>

<header class="header-container">
    <img src="images/wsfgsr.png" alt="En-tête du site" class="header-image_index" width="100%" height="250px">
</header>

<h1>Liste des appartements</h1>
<table class="table">
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
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($annonces as $annonce): ?>
            <tr>
                <form action="../C/c_TB_admin.php" method="post">
                    <td><?= $annonce['num_apart'] ?></td>
                    <td><input type="text" name="type_apart" value="<?= $annonce['type_apart'] ?>"></td>
                    <td><input type="text" name="prix_loc" value="<?= $annonce['prix_loc'] ?>"></td>
                    <td><input type="text" name="prix_charges" value="<?= $annonce['prix_charges'] ?>"></td>
                    <td><input type="text" name="rue" value="<?= $annonce['rue'] ?>"></td>
                    <td><input type="text" name="arrondissement" value="<?= $annonce['arrondissement'] ?>"></td>
                    <td><input type="text" name="etage" value="<?= $annonce['etage'] ?>"></td>
                    <td><input type="text" name="elevator" value="<?= $annonce['elevator'] ?>"></td>
                    <td><input type="text" name="preavis" value="<?= $annonce['preavis'] ?>"></td>
                    <td><input type="text" name="date_libre" value="<?= $annonce['date_libre'] ?>"></td>
                    <td><input type="text" name="num_prop" value="<?= $annonce['num_prop'] ?>"></td>
                    <td><input type="text" name="details" value="<?= $annonce['details'] ?>"></td>
                    <input type="hidden" name="num_apart" value="<?= $annonce['num_apart'] ?>">
                    <input type="hidden" name="action" value="modifierAppartement">
                    <td>
                        <button type="submit">Modifier</button>
                    </td>
                </form>
                <td>
                    <form action="../C/c_TB_admin.php" method="post">
                        <input type="hidden" name="action" value="supprimerAppartement">
                        <input type="hidden" name="num_apart" value="<?= $annonce['num_apart'] ?>">
                        <button type="submit" class="delete-button">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<h1>Liste des Proprietaires</h1>
<table class="table">
    <thead>
        <tr>
            <th>Numéro</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>Code Postal</th>
            <th>Téléphone</th>
            <th>Login</th>
            <th>Mot de passe</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($proprietaires as $proprietaire): ?>
            <tr>
                <form action="../C/c_TB_admin.php" method="post">
                    <td><?= $proprietaire['num_prop'] ?></td>
                    <td><input type="text" name="nom_prop" value="<?= $proprietaire['nom_prop'] ?>"></td>
                    <td><input type="text" name="prenom_prop" value="<?= $proprietaire['prenom_prop'] ?>"></td>
                    <td><input type="text" name="adresse_prop" value="<?= $proprietaire['adresse_prop'] ?>"></td>
                    <td><input type="text" name="cp_prop" value="<?= $proprietaire['cp_prop'] ?>"></td>
                    <td><input type="text" name="telephone_prop" value="<?= $proprietaire['telephone_prop'] ?>"></td>
                    <td><input type="text" name="login_prop" value="<?= $proprietaire['login_prop'] ?>"></td>
                    <td><input type="text" name="mdp_prop" value="<?= $proprietaire['mdp_prop'] ?>"></td>
                    <input type="hidden" name="num_prop" value="<?= $proprietaire['num_prop'] ?>">
                    <input type="hidden" name="action" value="modifierProprietaire">
                    <td>
                        <button type="submit">Modifier</button>
                    </td>
                </form>
                <td>
                    <form action="../C/c_TB_admin.php" method="post">
                        <input type="hidden" name="action" value="supprimerProprietaire">
                        <input type="hidden" name="num_prop" value="<?= $proprietaire['num_prop'] ?>">
                        <button type="submit" class="delete-button">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<h1>Liste des Demandeurs</h1>
<table class="table">
    <thead>
        <tr>
            <th>num_dem</th>
            <th>nom_dem</th>
            <th>prenom_dem</th>
            <th>adresse_dem</th>
            <th>cp_dem</th>
            <th>telephone_dem</th>
            <th>login_dem</th>
            <th>mdp_dem</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($demandeurs as $demandeur): ?>
            <tr>
                <form action="../C/c_TB_admin.php" method="post">
                    <td><?= $demandeur['num_dem'] ?></td>
                    <td><input type="text" name="nom_dem" value="<?= $demandeur['nom_dem'] ?>"></td>
                    <td><input type="text" name="prenom_dem" value="<?= $demandeur['prenom_dem'] ?>"></td>
                    <td><input type="text" name="adresse_dem" value="<?= $demandeur['adresse_dem'] ?>"></td>
                    <td><input type="text" name="cp_dem" value="<?= $demandeur['cp_dem'] ?>"></td>
                    <td><input type="text" name="telephone_dem" value="<?= $demandeur['telephone_dem'] ?>"></td>
                    <td><input type="text" name="login_dem" value="<?= $demandeur['login_dem'] ?>"></td>
                    <td><input type="text" name="mdp_dem" value="<?= $demandeur['mdp_dem'] ?>"></td>
                    <input type="hidden" name="num_dem" value="<?= $demandeur['num_dem'] ?>">
                    <input type="hidden" name="action" value="modifierDemandeur">
                    <td>
                        <button type="submit">Modifier</button>
                    </td>
                </form>
                <td>
                    <form action="../C/c_TB_admin.php" method="post">
                        <input type="hidden" name="action" value="supprimerDemandeur">
                        <input type="hidden" name="num_dem" value="<?= $demandeur['num_dem'] ?>">
                        <button type="submit" class="delete-button">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h1>Liste des Locataires</h1>
<table class="table">
    <thead>
        <tr>
            <th>num_loc</th>
            <th>nom_loc</th>
            <th>prenom_loc</th>
            <th>date_naissance</th>
            <th>telephone_loc</th>
            <th>numCompt_loc</th>
            <th>banque</th>
            <th>adresse_banque_loc</th>
            <th>cp_banque_loc</th>
            <th>login_loc</th>
            <th>mdp_loc</th>
            <th>num_apart</th>
            <th>num_dem</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($locataires as $locataire): ?>
            <tr>
                <form action="../C/c_TB_admin.php" method="post">
                    <td><?= $locataire['num_loc'] ?></td>
                    <td><input type="text" name="nom_loc" value="<?= $locataire['nom_loc'] ?>"></td>
                    <td><input type="text" name="prenom_loc" value="<?= $locataire['prenom_loc'] ?>"></td>
                    <td><input type="text" name="date_naissance" value="<?= $locataire['date_naissance'] ?>"></td>
                    <td><input type="text" name="telephone_loc" value="<?= $locataire['telephone_loc'] ?>"></td>
                    <td><input type="text" name="numCompt_loc" value="<?= $locataire['numCompt_loc'] ?>"></td>
                    <td><input type="text" name="banque" value="<?= $locataire['banque'] ?>"></td>
                    <td><input type="text" name="adresse_banque_loc" value="<?= $locataire['adresse_banque_loc'] ?>"></td>
                    <td><input type="text" name="cp_banque_loc" value="<?= $locataire['cp_banque_loc'] ?>"></td>
                    <td><input type="text" name="login_loc" value="<?= $locataire['login_loc'] ?>"></td>
                    <td><input type="text" name="mdp_loc" value="<?= $locataire['mdp_loc'] ?>"></td>
                    <td><input type="text" name="num_apart" value="<?= $locataire['num_apart'] ?>"></td>
                    <td><input type="text" name="num_dem" value="<?= $locataire['num_dem'] ?>"></td>
                    <input type="hidden" name="num_loc" value="<?= $locataire['num_loc'] ?>">
                    <input type="hidden" name="action" value="modifierLocataire">
                    <td>
                        <button type="submit">Modifier</button>
                    </td>
                </form>
                <td>
                    <form action="../C/c_TB_admin.php" method="post">
                        <input type="hidden" name="action" value="supprimerLocataire">
                        <input type="hidden" name="num_loc" value="<?= $locataire['num_loc'] ?>">
                        <button type="submit" class="delete-button">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<h1>Liste des Visites</h1>
<table class="table">
    <thead>
        <tr>
            <th>num_apart</th>
            <th>num_dem</th>
            <th>date_visite</th>
            <th>status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($visites as $visite): ?>
            <tr>
                <form action="../C/c_TB_admin.php" method="post">
                    <td><?= $visite['num_apart'] ?></td>
                    <td><?= $visite['num_dem'] ?></td>
                    <td><?= $visite['date_visite'] ?></td>
                    <td><?= $visite['status'] ?></td>
                    <input type="hidden" name="num_apart" value="<?= $visite['num_apart'] ?>">
                    <input type="hidden" name="num_dem" value="<?= $visite['num_dem'] ?>">
                    <input type="hidden" name="date_visite" value="<?= $visite['date_visite'] ?>">
                    <input type="hidden" name="status" value="<?= $visite['status'] ?>">
                    <input type="hidden" name="action" value="modifierVisite">
                    <td>
                        <button type="submit" class="modifier-button">Modifier</button>
                    </td>
                </form>
                <td>
                    <form action="../C/c_TB_admin.php" method="post">
                        <input type="hidden" name="action" value="supprimerVisite">
                        <input type="hidden" name="num_apart" value="<?= $visite['num_apart'] ?>">
                        <input type="hidden" name="num_dem" value="<?= $visite['num_dem'] ?>">
                        <input type="hidden" name="date_visite" value="<?= $visite['date_visite'] ?>">
                        <button type="submit" class="delete-button">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



</body>
</html>
