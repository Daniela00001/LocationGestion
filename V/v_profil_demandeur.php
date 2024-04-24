<?php
include 'v_espace_demandeur.php';

@session_start();


if (isset($_SESSION["demandeur"])) {
    $demandeur = $_SESSION["demandeur"];

?>

    <div class="profil-container">
        <h2>Profil du demandeur</h2>
        <p>Numéro du demandeur: <?php echo $demandeur->getNumDem(); ?></p>

        <form action="../C/c_modif_infos_dem.php" method="post" class="profil-dem-form">
            <label for="nom_dem" class="profil-label">Nom:</label>
            <input type="text" id="nom_dem" name="nom_dem" value="<?= $demandeur->getNomDem() ?>" class="profil-input">

            <label for="prenom" class="profil-label">Prénom:</label>
            <input type="text" id="prenom" name="prenom_dem" value="<?= $demandeur->getPrenomDem() ?>" class="profil-input">

            <label for="adresse_dem" class="profil-label">Adresse:</label>
<input type="text" id="adresse_dem" name="adresse_dem" value="<?= $demandeur->getAdresseDem() ?>" class="profil-input">

            <label for="cp" class="profil-label">Code postal:</label>
            <input type="text" id="cp" name="cp_dem" value="<?= $demandeur->getCpDem() ?>" class="profil-input">

            <label for="telephone" class="profil-label">Téléphone:</label>
            <input type="text" id="telephone" name="telephone_dem" value="<?= $demandeur->getTelephoneDem() ?>" class="profil-input">

    <input type="hidden" id="login" name="login_dem" value="<?= $demandeur->getLoginDem() ?>" class="profil-input">

    <input type="hidden" id="mdp" name="mdp_dem" value="<?= $demandeur->getMdpDem() ?>" class="profil-input">

    <input type="hidden" name="num_dem" value="<?= $demandeur->getNumDem() ?>">
    <input type="hidden" name="action" value="modifierDemandeur">
    <input type="submit" name="update" value="Mettre à jour">
</form>

        <form action="../C/c_supDemandeur.php" method="GET">
            <input type="hidden" name="num_dem" value="<?php echo $demandeur->getNumDem(); ?>">
            <button type="submit" class="custom-button">Supprimer</button>
        </form>
    </div>
<?php
}
?>
