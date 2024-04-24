<?php 
include 'v_espace_proprietaire.php'; 
include '../M/Modele  Appartement.php';
include '../C/c_TB_Prop.php'; 
?>

<link rel="stylesheet" href="CSS/styleSessionProp.css">

<div class="demandes-container">
   
<?php foreach ($demandes as $demande): ?>
    <?php 

$Appartement = Appartement::fromArrayToObject($demande);
$Locataire= Locataire ::fromArrayToObject($demande);

?>
    <div class="demande">
        <p><strong>Numéro appartement :</strong> <?php echo $Appartement->getNumApart(); ?></p>
        <p><strong>Prix location :</strong> <?php echo $Appartement->getPrixLoc(); ?></p>
        <p><strong>Prix charges :</strong> <?php echo $Appartement->getPrixCharges(); ?></p>
        <br><br>
        <p><strong>Total mensuel :</strong> 
            <?php 
                foreach ($total as $appartement) {
                    if ($appartement['num_apart'] == $demande['num_apart']) {
                        echo $appartement['total_mensuel'];
                        break; 
                    }
                }
            ?>
        </p>

        <p><Details>Locataire
          
            <p><strong>Nom locataire :</strong> <?php echo $Locataire->getNomLoc(); ?></p>
            <p><strong>Prénom_loc locataire :</strong> <?php echo $Locataire->getPrenomLoc(); ?></p>
            <p><strong>Date de naissance :</strong> <?php echo $Locataire->getDateNaissance(); ?></p>
            <p><strong>Telephone :</strong> <?php echo $Locataire->getTelephoneLoc(); ?></p>
            <p><strong>numCompt_loc:</strong> <?php echo $Locataire->getNumComptLoc(); ?></p>
            <p><strong>banque :</strong> <?php echo $Locataire->getBanque(); ?></p>
            <p><strong>adresse_banque_loc :</strong><?php echo $Locataire->getAdresseBanqueLoc(); ?></p>
            <p><strong>cp_banque_loc:</strong> <?php echo $Locataire->getCpBanqueLoc(); ?></p>
        </Details></p>
        <br>
        <form action="../C/c_supLoc.php" method="post">
            <input type="hidden" name="num_loc" value="<?php echo $demande['num_loc']; ?>">
            <input type="submit" name="supprimer" value="Supprimer">
        </form>
        <br><br>
    </div>
<?php endforeach; ?>
<p><strong>Somme totale  :</strong> <?php echo $totalProp; ?></p>

</div>
