<?php 
include 'v_espace_proprietaire.php';
include '../C/c_demandesProprietaire.php'; ?>

<link rel="stylesheet" href="CSS/styleSessionProp.css">
<br>
    <br>
   
    <H1>Vos Demandes </H1>
   
    <?php foreach ($demandes as $demande): ?>
        <div class="demande">
        <p><strong>ID demande :</strong> <?php echo $demande['ID_demande']; ?></p>
            <p><strong>Numéro demandeur :</strong> <?php echo $demande['num_dem']; ?></p>
            <p><strong>Numéro appartement :</strong> <?php echo $demande['num_apart']; ?></p>
            <p><strong>Statut demande :</strong> <?php echo $demande['Statut_demande']; ?></p>
            <form action="../C/c_demandesProprietaire.php" method="post">
    <input type="hidden" name="ID_demande" value="<?php echo $demande['ID_demande']; ?>">
    
    <input class="accepter" type="submit" name="accepter" value="Accepter">

    <input class="refuser" type="submit" name="refuser" value="Refuser">
</form>

</form>

        </div>
    <?php endforeach; ?>
