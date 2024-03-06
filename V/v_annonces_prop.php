<?php
include 'v_espace_proprietaire.php';
include '../M/Class Appartement.php';

?>

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

                echo "<label for='type_apart'>Type :</label>";
                echo "<input type='text' name='type_apart' id='type_apart_{$num_apart}' value='{$annonce['type_apart']}'>";

                echo "<label for='prix_loc'>Prix de location :</label>";
                echo "<input type='text' name='prix_loc' id='prix_loc_{$num_apart}' value='{$annonce['prix_loc']}'>";

                echo "<label for='prix_charges'>Prix charges :</label>";
                echo "<input type='text' name='prix_charges' id='prix_charges_{$num_apart}' value='{$annonce['prix_charges']}'>";

                echo "<label for='rue'>Rue :</label>";
                echo "<input type='text' name='rue' id='rue_{$num_apart}' value='{$annonce['rue']}'>";

                echo "<label for='arrondissement'>Arrondissement :</label>";
                echo "<input type='text' name='arrondissement' id='arrondissement_{$num_apart}' value='{$annonce['arrondissement']}'>";

                echo "<label for='etage'>Étage :</label>";
                echo "<input type='text' name='etage' id='etage_{$num_apart}' value='{$annonce['etage']}'>";

                echo "<label for='elevator'>Ascenseur :</label>";
                echo "<input type='text' name='elevator' id='elevator_{$num_apart}' value='{$annonce['elevator']}'>";

                echo "<label for='preavis'>Préavis :</label>";
                echo "<input type='text' name='preavis' id='preavis_{$num_apart}' value='{$annonce['preavis']}'>";

                echo "<label for='date_libre'>Date libre :</label>";
                echo "<input type='text' name='date_libre' id='date_libre_{$num_apart}' value='{$annonce['date_libre']}'>";

                echo "<label for='details'>Details :</label>";
                echo "<input type='text' name='details' id='details{$num_apart}' value='{$annonce['details']}'>";
                echo "<br>";
                echo "<button type='submit' name='action' value='supprimer_appartement'>Supprimer</button>";
                echo "<button type='submit' name='action' value='modifier_appartement'>Modifier</button>";

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
<style>/* Style général */
.annonce {
    border: 1px solid #ccc;
    padding: 20px;
    margin-bottom: 2px;
    border-radius: 5px;
    width: 50%;
}

.annonce-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
    width: 30%;
}

/* Style des champs */
label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"] {
    width: 30%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

/* Style des boutons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 10px;
}

button:hover {
    background-color: #45a049;
}

/* Style du conteneur */
.separator {
    margin-top: 20px;
}

/* Style du bouton "Ajouter une annonce" */
.button-container {
    margin-bottom: 20px;
}

.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-right: 10px;
    cursor: pointer;
    border-radius: 4px;
}

.button i {
    margin-left: 5px;
}

.button:hover {
    background-color: #45a049;
}
</style>