<?php
include 'v_espace_proprietaire.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Formulaire Appartement</title>
</head>
<body>
    <h2>Ajouter un nouvel appartement</h2>
    <form action="../C/c_appartement_propNew.php" method="post" enctype="multipart/form-data">
        
        <label for="type_apart">Type d'appartement:</label>
        <input type="text" name="type_apart" required><br>

        <label for="prix_loc">Prix de location:</label>
        <input type="text" name="prix_loc" required><br>

        <label for="prix_charges">Prix des charges:</label>
        <input type="text" name="prix_charges"><br>

        <label for="rue">Rue:</label>
        <input type="text" name="rue" required><br>

        <label for="arrondissement">Arrondissement:</label>
        <input type="text" name="arrondissement"><br>

        <label for="etage">Étage:</label>
        <input type="text" name="etage"><br>

        <label for="elevator">Ascenseur:</label>
<input type="radio" name="elevator" value="oui"> Oui
<input type="radio" name="elevator" value="non" checked> Non<br>
<br>
<label for="preavis">Préavis:</label>
<input type="radio" name="preavis" value="oui"> Oui
<input type="radio" name="preavis" value="non" checked> Non<br>


        <label for="date_libre">Date de disponibilité:</label>
        <input type="date" name="date_libre"><br>

        <label for="details">Details:</label>
        <input type="text" name="details"><br>

        <label for="image">Sélectionnez une image :</label>
        <input type="file" name="image" id="image">
        <div id="imagePreview"></div>



        <input type="submit" value="Ajouter">
    </form>
</body>
</html>


<style>
       
        h2 {
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 20px auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="date"],
        input[type="file"] {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="radio"] {
            margin-right: 5px;
            margin-bottom: 10px;
        }
       
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>