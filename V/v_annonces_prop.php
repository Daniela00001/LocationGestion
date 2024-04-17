<?php
include 'v_espace_proprietaire.php';
include '../M/Modele  Appartement.php';

?>
<link rel="stylesheet" type="text/css" href="../V/CSS/styleSessionProp.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<div class="button-container">
    <a href="v_annonces_ajoutApp.php" class="button">
        Ajouter une annonce <i class="fas fa-plus"></i>
    </a>
</div>

<div class='separator'>
    <?php
    if (isset($_SESSION['proprietaire'])) {
        $proprietaire_id = $_SESSION["proprietaire"]["num_prop"];

        $appartement = new Appartement();
        $annonces_proprietaire = $appartement->getAnnoncesParProprietaire($proprietaire_id);

        if (!empty($annonces_proprietaire)) {
            echo "<h2>Vos annonces :</h2>";
            foreach ($annonces_proprietaire as $annonce) {
                $num_apart = $annonce['num_apart'];

                echo "<div class='annonce' data-num_apart='{$num_apart}'>";
                echo "<form action='../C/c_appartement_prop.php' method='post'>";
                echo "<input type='hidden' name='num_apart' value='{$num_apart}'>";

                echo "<p class='annonce-title'>ID Appartement : " . $annonce['num_apart'] . "</p>";

                echo "<div class='input-group'>";
                echo "<label for='type_apart'>Type :</label>";
                echo "<input type='text' name='type_apart' id='type_apart_{$num_apart}' value='{$annonce['type_apart']}'>";
                echo "</div>";
                echo "<div class='input-group'>";

                echo "<label for='prix_loc'>Prix de location :</label>";
                echo "<input type='text' name='prix_loc' id='prix_loc_{$num_apart}' value='{$annonce['prix_loc']}'>";
                echo "</div>";
                echo "<div class='input-group'>";
                echo "<label for='prix_charges'>Prix charges :</label>";
                echo "<input type='text' name='prix_charges' id='prix_charges_{$num_apart}' value='{$annonce['prix_charges']}'>";
                echo "</div>";
                echo "<div class='input-group'>";
                echo "<label for='rue'>Rue :</label>";
                echo "<input type='text' name='rue' id='rue_{$num_apart}' value='{$annonce['rue']}'>";
                echo "</div>";
                echo "<div class='input-group'>";
                echo "<label for='arrondissement'>Arrondissement :</label>";
                echo "<input type='text' name='arrondissement' id='arrondissement_{$num_apart}' value='{$annonce['arrondissement']}'>";
                echo "</div>";
                echo "<div class='input-group'>";
                echo "<label for='etage'>Étage :</label>";
                echo "<input type='text' name='etage' id='etage_{$num_apart}' value='{$annonce['etage']}'>";
                echo "</div>";
                echo "<div class='input-group'>";
                echo "<label for='elevator'>Ascenseur :</label>";
                echo "<input type='text' name='elevator' id='elevator_{$num_apart}' value='{$annonce['elevator']}'>";
                echo "</div>";
                echo "<div class='input-group'>";
                echo "<label for='preavis'>Préavis :</label>";
                echo "<input type='text' name='preavis' id='preavis_{$num_apart}' value='{$annonce['preavis']}'>";
                echo "</div>";
                echo "<div class='input-group'>";
                echo "<label for='date_libre'>Date libre :</label>";
                echo "<input type='text' name='date_libre' id='date_libre_{$num_apart}' value='{$annonce['date_libre']}'>";
                echo "</div>";
                echo "<div class='input-group'>";
                echo "<label for='details'>Details :</label>";
                echo "<input type='text' name='details' id='details{$num_apart}' value='{$annonce['details']}'>";
                echo "</div>";
                echo "<br>";
                
                echo "<button class='rouge' type='submit' name='action' value='supprimer_appartement'>Supprimer</button>";
                
                echo "<button class='marron' type='submit' name='action' value='modifier_appartement'>Modifier</button>";

                echo "</form>";
                echo "</div>";
            }

        } else {
            echo "<p>Vous n'avez pas encore ajouté d'appartements.</p>";
        }
    } else {
        echo "<p>Veuillez vous connecter en tant que propriétaire pour voir vos annonces.</p>";
    }
    ?>
</div>