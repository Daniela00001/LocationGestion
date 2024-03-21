
    <?php
    include 'v_espace_proprietaire.php';

    if (isset($_SESSION["proprietaire"])) {
        $proprietaireInfos = $_SESSION["proprietaire"];
        
        $proprietaire_data = isset($proprietaire_data) ? $proprietaire_data : $proprietaireInfos;

        ?>
       <br>
       <br>
        <div class="profil-container">
            <h2>Profil du propriétaire</h2>
            <p>Numéro du propriétaire: <?php echo $proprietaire_data['num_prop']; ?></p>
            <form action="../C/c_modif_infos_prop.php" method="post">
                <label for="nom_prop">Nom:</label>
                <input type="text" id="nom_prop" name="nom_prop" value="<?= $proprietaire_data['nom_prop'] ?>">

                <label for="prenom_prop">Prénom:</label>
                <input type="text" id="prenom_prop" name="prenom_prop" value="<?= $proprietaire_data['prenom_prop'] ?>">

                <label for="adresse_prop">Adresse:</label>
                <input type="text" id="adresse_prop" name="adresse_prop" value="<?= $proprietaire_data['adresse_prop'] ?>">

                <label for="cp_prop">Code postal:</label>
                <input type="text" id="cp_prop" name="cp_prop" value="<?= $proprietaire_data['cp_prop'] ?>">

                <label for="telephone_prop">Téléphone:</label>
                <input type="text" id="telephone_prop" name="telephone_prop" value="<?= $proprietaire_data['telephone_prop'] ?>">

                <input type="hidden" name="num_prop" value="<?= $proprietaire_data['num_prop'] ?>">
                <input type="submit" name="update" value="Mettre à jour">
            </form>
            <form action="../C/c_supProp.php" method="GET">
    <input type="hidden" name="num_prop" value="<?php echo $proprietaire_data['num_prop']; ?>">
    <button type="submit" class="custom-button">Supprimer</button>
</form>

        </div>
    <?php
    }
    ?>
</body>
</html>