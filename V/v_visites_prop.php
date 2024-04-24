<?php
include 'v_espace_proprietaire.php';
include '../C/c_visitesProp.php';

$proprietaire = $_SESSION["proprietaire"];
?>
<br>
<br>
<br>

<link rel="stylesheet" href="CSS/styleSessionProp.css">
<H1>Vos visites</H1>

<div class="visites-container">
    <?php foreach ($visites as $visite): ?>

    <?php 

    $Visite = Visite::fromArrayToObject($visite);

    ?>

    <p class="prop-info"><?php echo $Visite->getNumDem(); ?></p> 

    <div class="visite" id="visite_<?php echo $Visite->getNumApart(); ?>">
        <h3>Numéro d'appartement : <?php echo $Visite->getNumApart(); ?></h3>
        <p>Date de visite : <?php echo $Visite->getdate_visiteDemande(); ?></p>
        <p>Numéro demandeur : <?php echo $Visite->getNumDem(); ?></p>
    
        <form method="POST" action="../C/c_visitesProp.php"> 
            <input type="hidden" name="num_apart" value="<?php echo $Visite->getNumApart(); ?>">
            <button type="submit">Supprimer</button>
        </form>
    </div>
    <br>

    <?php endforeach; ?>
</div>
