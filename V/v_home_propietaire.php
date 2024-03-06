<?php 
include 'v_espace_proprietaire.php'; 
include '../C/c_TB_Prop.php'; 
?>

<link rel="stylesheet" href="CSS/styleSessionProp.css">

<div class="demandes-container">
   
<?php foreach ($demandes as $demande): ?>
    <div class="demande">
        <p><strong>Numéro locataire :</strong> <?php echo $demande['num_loc']; ?></p>
        <p><strong>Numéro appartement :</strong> <?php echo $demande['num_apart']; ?></p>
        <p><strong>Prix location :</strong> <?php echo $demande['prix_loc']; ?></p>
        <p><strong>Prix charges :</strong> <?php echo $demande['prix_charges']; ?></p>
        <!-- Assurez-vous que $totaux_par_appartement est défini -->
        <p><strong>Total mensuel :</strong> <?php echo $totaux_par_appartement; ?></p>
        <form action="../C/c_supprimer_locataire.php" method="post">
            <input type="submit" name="supprimer" value="Supprimer">
        </form>
       <br><br>
    </div>
<?php endforeach; ?>

<!-- Assurez-vous que $total_mensuel est défini -->
<p><strong>Total mensuel :</strong> <?php echo $total_mensuel; ?></p>

</div> <!-- Fermeture de la div demandes-container -->
