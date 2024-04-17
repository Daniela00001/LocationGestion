<?php
include 'v_espace_proprietaire.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../CSS/styleSessionProp.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Appartement</title>
  
    <script>
        function validateForm() {
            var prix_loc = document.getElementById("prix_loc").value;
            if (isNaN(prix_loc) || prix_loc < 0 || prix_loc > 100000) {
                alert("Le prix de location doit être un nombre positif et ne pas dépasser 100000 euros.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h2>Ajouter un nouvel appartement</h2>
    <form class="appartement-form" action="../C/c_appartement_propNew.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        
        <label for="type_apart" class="appartement-label">Type d'appartement:</label>
        <select name="type_apart" class="appartement-select" required>
            <option value="Studio">Studio</option>
            <option value="Maison">Maison</option>
            <option value="Pantahouse">Pantahouse</option>
            <option value="T1">T1</option>
            <option value="T2">T2</option>
            <option value="T3">T3</option>
            <option value="T4">T4</option>
            <option value="T5">T5</option>

        </select><br>

        <label for="prix_loc" class="appartement-label">Prix de location :</label>
        <input type="number" id="prix_loc" name="prix_loc" min="0" max="100000" class="appartement-input" required><br>

        <label for="prix_charges" class="appartement-label">Prix des charges:</label>
        <input type="number" name="prix_charges" min="0" class="appartement-input"><br>

        <label for="rue" class="appartement-label">Rue:</label>
        <input type="text" name="rue" class="appartement-input" required><br>

        <label for="arrondissement" class="appartement-label">Arrondissement:</label>
        <select name="arrondissement" class="appartement-select">
            <?php
                for ($arrondissement = 1; $arrondissement <= 20; $arrondissement++) {
                    echo "<option value=\"$arrondissement\">$arrondissement</option>";
                }
            ?>
        </select><br>

        <label for="etage" class="appartement-label">Étage:</label>
        <select name="etage" class="appartement-select">
            <option value="0">Rez-de-chaussée</option>
            <?php
                for ($i = 1; $i <= 30; $i++) {
                    echo "<option value=\"$i\">$i</option>";
                }
            ?>
        </select><br>

        <label for="elevator" class="appartement-label">Ascenseur:</label>
        <input type="radio" name="elevator" value="oui" class="appartement-radio"> Oui
        <input type="radio" name="elevator" value="non" checked class="appartement-radio"> Non<br>
<br>
        <label for="preavis" class="appartement-label">Préavis:</label>
        <input type="radio" name="preavis" value="oui" class="appartement-radio"> Oui (préavis de 3 mois)
        <input type="radio" name="preavis" value="non" checked class="appartement-radio"> Non<br>
<br>
        <label for="date_libre" class="appartement-label">Date de disponibilité:</label>
        <input type="date" id="date_libre" name="date_libre" min="<?php echo date('Y-m-d'); ?>" class="appartement-input" required><br>

        <label for="details" class="appartement-label">Détails:</label>
        <textarea name="details" class="appartement-textarea"></textarea><br>

        <input type="submit" value="Ajouter" class="appartement-submit">
    </form>
</body>
</html>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .appartement-form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .appartement-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .appartement-input,
        .appartement-select,
        .appartement-textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .appartement-radio {
            margin-right: 10px;
        }

        .appartement-submit {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .appartement-submit:hover {
            background-color: #45a049;
        }

    </style>