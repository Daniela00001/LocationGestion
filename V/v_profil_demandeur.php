
<?php
include 'v_espace_demandeur.php';

if (isset($_SESSION["demandeur"])) {
    $demandeurInfos = $_SESSION["demandeur"];
    
    // Vérifie si les données du demandeur ont été mises à jour
    $demandeur_data = isset($demandeur_data) ? $demandeur_data : $demandeurInfos;

    ?>
    <div class="profil-container">
        <h2>Profil du demandeur</h2>
        <p>Numéro du demandeur: <?php echo $demandeur_data['num_dem']; ?></p>

        <form action="../C/c_modif_infos_dem.php" method="post" class="profil-dem-form">
            <label for="nom_dem" class="profil-label">Nom:</label>
            <input type="text" id="nom_dem" name="nom_dem" value="<?= $demandeur_data['nom_dem'] ?>" class="profil-input">

            <label for="prenom" class="profil-label">Prénom:</label>
            <input type="text" id="prenom" name="prenom" value="<?= $demandeur_data['prenom_dem'] ?>" class="profil-input">

            <label for="adresse" class="profil-label">Adresse:</label>
            <input type="text" id="adresse" name="adresse" value="<?= $demandeur_data['adresse_dem'] ?>" class="profil-input">

            <label for="cp" class="profil-label">Code postal:</label>
            <input type="text" id="cp" name="cp" value="<?= $demandeur_data['cp_dem'] ?>" class="profil-input">

            <label for="telephone" class="profil-label">Téléphone:</label>
            <input type="text" id="telephone" name="telephone" value="<?= $demandeur_data['telephone_dem'] ?>" class="profil-input">

            <input type="hidden" name="num_dem" value="<?= $demandeur_data['num_dem'] ?>">
            <input type="submit" name="update" value="Mettre à jour" class="profil-submit">
        </form>

        <form action="../C/c_supDemandeur.php" method="GET">
            <input type="hidden" name="num_dem" value="<?php echo $demandeurInfos['num_dem']; ?>">
            <button type="submit" class="custom-button">Supprimer</button>
        </form>
    </div>
<?php
}
?>
</body>
</html>
