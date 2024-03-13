<?php 
include 'v_espace_proprietaire.php'; 
include '../C/c_TB_Prop.php'; 
?>

<link rel="stylesheet" href="CSS/styleSessionProp.css">

<div class="demandes-container">
   
<?php foreach ($demandes as $demande): ?>
    <div class="demande">

    
    <p><strong>Numéro appartement :</strong> <?php echo $demande['num_apart']; ?></p>
        <p><strong>Prix location :</strong> <?php echo $demande['prix_loc']; ?></p>
        <p><strong>Prix charges :</strong> <?php echo $demande['prix_charges']; ?></p>
       <br><br>
        <p><strong>Total mensuel :</strong> <?php echo $totaux_par_appartement; ?></p>
        <p><Details>Locataire
        <p><strong>Numéro locataire :</strong> <?php echo $demande['num_loc']; ?></p>
        <p><strong>Nom locataire :</strong> <?php echo $demande['nom_loc']; ?></p>
        <p><strong>Prénom_loc locataire :</strong> <?php echo $demande['prenom_loc']; ?></p>
        
        <p><strong>Date de naissance :</strong> <?php echo $demande['date_naissance']; ?></p>
        <p><strong>Telephone :</strong> <?php echo $demande['telephone_loc']; ?></p>
        <p><strong>numCompt_loc:</strong> <?php echo $demande['numCompt_loc']; ?></p>

        <p><strong>banque :</strong> <?php echo $demande['banque']; ?></p>
        <p><strong>adresse_banque_loc :</strong> <?php echo $demande['adresse_banque_loc']; ?></p>
        <p><strong>cp_banque_loc:</strong> <?php echo $demande['cp_banque_loc']; ?></p>
        </Details></p>
<br>
<form action="../C/c_supLoc.php" method="post">
    <input type="hidden" name="num_loc" value="<?php echo $demande['num_loc']; ?>">
    <input type="submit" name="supprimer" value="Supprimer">
</form>

       <br><br>
    </div>
<?php endforeach; ?>

<!-- Assurez-vous que $total_mensuel est défini -->
<p><strong>Total mensuel :</strong> <?php echo $total_mensuel; ?></p>

</div>
