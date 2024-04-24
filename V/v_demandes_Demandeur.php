<?php 
include 'v_espace_demandeur.php';
include '../C/c_demandesDemandeur.php'; 
?>
<br>
<link rel="stylesheet" href="CSS/styleSessionDem.css">

<H1>Vos Demandes </H1> 
<div class="demandes-container">
    <?php if (empty($demandes)): ?>
        <h2>Vous n'avez pas de demandes</h2> 
    <?php endif ;?>
    <?php foreach ($demandes as $demande): ?>
    
        <?php  $Demande = DemandeLocation::fromArrayToObject($demande); ?>

        <div class="demande">
        <p><strong>ID demande :</strong> <?php echo $Demande->getIDDemande(); ?></p>
            <p><strong>Numéro demandeur :</strong> <?php echo $Demande->getNumDem(); ?></p>
            <p><strong>Numéro appartement :</strong> <?php echo $Demande->getNumApart(); ?></p>
            <p><strong>Statut demande :</strong> <?php echo $Demande->getStatutDemande(); ?></p>
            <?php if ($demande['Statut_demande'] == 'Acceptée'): ?>
                <form action="v_inscriptionL.php" method="post">
                    <input type="hidden" name="num_apart" value="<?php echo $Demande->getNumApart(); ?>">
                    <input type="hidden" name="ID_demande" value="<?php echo $Demande->getIDDemande(); ?>">
                    <input type="submit" value="Visualiser">
                </form>
            <?php endif; ?>
            
            <form action="../C/c_Sup_c_demandesDemandeur.php" method="post">
                <input type="hidden" name="action" value="supprimer_demande">
                <input type="hidden" name="ID_demande" value="<?php echo $Demande->getIDDemande(); ?>">
                <button type='submit'>Supprimer</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>
