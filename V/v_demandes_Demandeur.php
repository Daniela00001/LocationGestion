<?php 
session_start(); 

include 'v_espace_demandeur.php';
include '../C/c_demandesDemandeur.php'; 
?>
<br>
<link rel="stylesheet" href="CSS/styleSessionDem.css">
<h1>Vos Demandes </h1>

<div class="demandes-container">
    <?php foreach ($demandes as $demande): ?>
        <div class="demande">
            <p><strong>ID demande :</strong> <?php echo $demande['ID_demande']; ?></p>
            <p><strong>Numéro demandeur :</strong> <?php echo $demande['num_dem']; ?></p>
            <p><strong>Numéro appartement :</strong> <?php echo $demande['num_apart']; ?></p>
            <p><strong>Statut demande :</strong> <?php echo $demande['Statut_demande']; ?></p>
            
            <?php if ($demande['Statut_demande'] == 'Acceptée'): ?>
                <!-- Lorsque la demande est acceptée, affichez le formulaire avec le bouton "Visualiser" -->
                <form action="v_inscriptionL.php" method="post">
                    <input type="hidden" name="num_apart" value="<?php echo $demande['num_apart']; ?>">
                    <input type="hidden" name="ID_demande" value="<?php echo $demande['ID_demande']; ?>">
                    <input type="submit" value="Visualiser">
                </form>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>