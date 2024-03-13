<style>
    /* Styles pour le contenu du profil */
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

        .profil-container h2 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #333; /* Couleur du texte */
        }

        .profil-container label {
            display: block;
            margin-bottom: 5px;
        }

        .profil-container input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
            box-sizing: border-box; /* Inclure la bordure et le rembourrage dans la largeur totale */
        }

        .profil-container input[type="submit"] {
            background-color: purple;
            color: white;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .profil-container input[type="submit"]:hover {
            background-color: #7d26cd;
        }
      
   </style>
</head>
<body>
    <?php
    include 'v_espace_proprietaire.php';

    if (isset($_SESSION["proprietaire"])) {
        $proprietaireInfos = $_SESSION["proprietaire"];
        
        $proprietaire_data = isset($proprietaire_data) ? $proprietaire_data : $proprietaireInfos;

        ?>
       <br>
       <br>
        <div class="profil-container">
            <h2>Profil du propriétaire</h2>
            <p>Numéro du propriétaire: <?php echo $proprietaire_data['num_prop']; ?></p>



            <form action="../C/c_supProp.php" method="GET">
            <input type="hidden" name="num_prop" value="<?php echo $proprietaire_data['num_prop']; ?>">
            <button type="submit">Supprimer</button>
        </form>



        
            <form action="../C/c_modif_infos_prop.php" method="post">
                <label for="nom_prop">Nom:</label>
                <input type="text" id="nom_prop" name="nom_prop" value="<?= $proprietaire_data['nom_prop'] ?>">

                <label for="prenom_prop">Prénom:</label>
                <input type="text" id="prenom_prop" name="prenom_prop" value="<?= $proprietaire_data['prenom_prop'] ?>">

                <label for="adresse_prop">Adresse:</label>
                <input type="text" id="adresse_prop" name="adresse_prop" value="<?= $proprietaire_data['adresse_prop'] ?>">

                <label for="cp_prop">Code postal:</label>
                <input type="text" id="cp_prop" name="cp_prop" value="<?= $proprietaire_data['cp_prop'] ?>">

                <label for="telephone_prop">Téléphone:</label>
                <input type="text" id="telephone_prop" name="telephone_prop" value="<?= $proprietaire_data['telephone_prop'] ?>">

                <input type="hidden" name="num_prop" value="<?= $proprietaire_data['num_prop'] ?>">
                <input type="submit" name="update" value="Mettre à jour">
            </form>
        </div>
    <?php
    }
    ?>
</body>
</html>