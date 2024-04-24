
<?php
    include 'v_espace_proprietaire.php';
    @session_start();

    if (isset($_SESSION["proprietaire"])) {
        $proprietaire = $_SESSION["proprietaire"];
    ?>
  
       <br>
       <br>
        <div class="profil-container">
            <h2>Profil du propriétaire</h2>
            <p>Numéro du propriétaire: <?php echo $proprietaire->getNumProp(); ?></p>
            <form action="../C/c_modif_infos_prop.php" method="post">
                <label for="nom_prop">Nom:</label>
                <input type="text" id="nom_prop" name="nom_prop" value="<?php echo $proprietaire->getNomProp(); ?>">

                <label for="prenom_prop">Prénom:</label>
                <input type="text" id="prenom_prop" name="prenom_prop" value="<?php echo $proprietaire->getPrenomProp(); ?>">

                <label for="adresse_prop">Adresse:</label>
                <input type="text" id="adresse_prop" name="adresse_prop" value="<?php echo $proprietaire->getAdresseProp(); ?>">

                <label for="cp_prop">Code postal:</label>
                <input type="text" id="cp_prop" name="cp_prop" value="<?php echo $proprietaire->getCpProp(); ?>">

                <label for="telephone_prop">Téléphone:</label>
                <input type="text" id="telephone_prop" name="telephone_prop" value="<?php echo $proprietaire->getTelephoneProp(); ?>">

    <input type="hidden" id="login_prop" name="login_prop" value="<?php echo $proprietaire->getLoginProp(); ?>">

    <input type="hidden" id="mdp_prop" name="mdp_prop" value="<?php echo $proprietaire->getMdpProp(); ?>">

                <input type="hidden" name="num_prop" value="<?php echo $proprietaire->getNumProp(); ?>">
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