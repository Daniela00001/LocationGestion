<?php
include 'v_espace_locataire.php';
@session_start();
if (isset($_SESSION["locataire"])) {
    $locataireInfos = $_SESSION["locataire"];
    
    
    $locataire_data = isset($locataire_data) ? $locataire_data : $locataireInfos;

 
?>
<br>
<br>
<div class="profil-container">
    <h2>Profil du locataire</h2>
    <p>Numéro du locataire: <?php echo $locataireInfos['num_loc']; ?></p>

    <br>
    <br>
<br><br><br>
            <form action="../C/c_modif_infos_loc.php" method="post">
                <label for="nom_loc">Nom:</label>
                <input type="text" id="nom_loc" name="nom_loc" value="<?= $locataireInfos['nom_loc'] ?>">

                <label for="prenom_loc">Prénom:</label>
                <input type="text" id="prenom_loc" name="prenom_loc" value="<?= $locataireInfos['prenom_loc'] ?>">

                <label for="date_naissance">Date de naissance:</label>
                <input type="text" id="date_naissance" name="date_naissance" value="<?= $locataireInfos['date_naissance'] ?>">

                <label for="telephone_loc">Téléphone:</label>
                <input type="text" id="telephone_loc" name="telephone_loc" value="<?= $locataireInfos['telephone_loc'] ?>">

                <label for="numCompt_loc">Numéro de compte:</label>
                <input type="text" id="numCompt_loc" name="numCompt_loc" value="<?= $locataireInfos['numCompt_loc'] ?>">

                <label for="banque">Banque:</label>
                <input type="text" id="banque" name="banque" value="<?= $locataireInfos['banque'] ?>">

                <label for="adresse_banque_loc">Adresse de la banque:</label>
                <input type="text" id="adresse_banque_loc" name="adresse_banque_loc" value="<?= $locataire_data['adresse_banque_loc'] ?>">

                <label for="cp_banque_loc">Code postal de la banque:</label>
                <input type="text" id="cp_banque_loc" name="cp_banque_loc" value="<?= $locataireInfos['cp_banque_loc'] ?>">
                
                <input type="hidden" id="login_loc" name="login_loc" value="<?= $locataireInfos['login_loc'] ?>" readonly>

                <input type="hidden" id="mdp_loc" name="mdp_loc" value="<?= $locataireInfos['mdp_loc'] ?>" readonly>


                <input type="hidden" name="num_loc" value="<?= $locataireInfos['num_loc'] ?>">
                <input type="submit" name="update" value="Mettre à jour">
            </form>
            <form action="../C/c_supLoc.php" method="GET">
            <input type="hidden" name="num_loc" value="<?php echo $locataireInfos['num_loc']; ?>">
            <button type="submit">Supprimer</button>
        </form>
      
        </div>
        <?php
    }
    ?>
</body>
</html>



