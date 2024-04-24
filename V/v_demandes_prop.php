<?php 
include 'v_espace_proprietaire.php';
include '../M/Modele  Demande.php';
include '../C/c_demandesProprietaire.php'; 
?>

<link rel="stylesheet" href="CSS/styleSessionProp.css">
<br>
    <br>
 
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
            <form action="../C/c_demandesProprietaire.php" method="post">
    <input type="hidden" name="ID_demande" value="<?php echo $Demande->getIDDemande(); ?>">
    
    <input type="submit" name="accepter" value="Accepter">

    <input type="submit" name="refuser" value="Refuser">
</form>

        </div>
    <?php endforeach; ?>
</div>
<style>
.demandes-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.demande {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 5px;
    width: calc(20% - 10px); /* Pour afficher 2 éléments par ligne avec un espacement de 10px */
    box-sizing: border-box; /* Inclure la bordure et le rembourrage dans la largeur totale */
}

.demande p {
    margin: 5px 0; /* Ajustement des marges des paragraphes */
}

.demande form {
    margin-left: auto; /* Aligner les boutons à droite */
}

.demande input[type="submit"] {
    background-color: purple;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 8px 15px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.demande input[type="submit"]:hover {
    background-color: #7d26cd;
}


</style>