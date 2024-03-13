
    <?php
    include 'v_espace_demandeur.php';

    if (isset($_SESSION["demandeur"])) {
        $demandeurInfos = $_SESSION["demandeur"];
        
        // Vérifie si les données du demandeur ont été mises à jour
        $demandeur_data = isset($demandeur_data) ? $demandeur_data : $demandeurInfos;

        ?>
        <br>
        <br>
          <div class="profil-container">
        <h2>Profil du demandeur</h2>
        <p>Numéro du demandeur: <?php echo $demandeur_data['num_dem']; ?></p>
        
        <form action="../C/c_modif_infos_dem.php" method="post">

            <label for="nom_dem">Nom:</label>
            <input type="text" id="nom_dem" name="nom_dem" value="<?= $demandeur_data['nom_dem'] ?>">

            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" value="<?= $demandeur_data['prenom_dem'] ?>">

            <label for="adresse">Adresse:</label>
            <input type="text" id="adresse" name="adresse" value="<?= $demandeur_data['adresse_dem'] ?>">

            <label for="cp">Code postal:</label>
            <input type="text" id="cp" name="cp" value="<?= $demandeur_data['cp_dem'] ?>">

            <label for="telephone">Téléphone:</label>
            <input type="text" id="telephone" name="telephone" value="<?= $demandeur_data['telephone_dem'] ?>">

            
            <input type="hidden" name="num_dem" value="<?= $demandeur_data['num_dem'] ?>">
            <input type="submit" name="update" value="Mettre à jour">
        </form>
        </div>
    <?php
    }
    ?>
</body>
</html>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            color: #333;
        }
        .profil-container {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 30%; /* Définir une largeur fixe */
            margin: 0 auto; /* Centrer horizontalement */
            box-sizing: border-box; /* Inclure la bordure et le rembourrage dans la largeur totale */
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>