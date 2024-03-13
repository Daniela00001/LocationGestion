<?php
include 'v_espace_locataire.php';

if (isset($_SESSION["locataire"])) {
    $locataireInfos = $_SESSION["locataire"];
}
?>
<br>
<br>
<div class="profil-container">
    <h2>Profil du locataire</h2>
    <p>Numéro du locataire: <?php echo $locataireInfos['num_loc']; ?></p>

    <br>
    <br>

   
        <form action="../C/c_supLoc.php" method="GET">
            <!-- Ajouter un champ caché pour transmettre le numéro de demandeur -->
            <input type="hidden" name="num_loc" value="<?php echo $locataireInfos['num_loc']; ?>">
            <button type="submit">Supprimer</button>
        </form>
      

    <script>
        function garderCompte() {
            // Rediriger l'utilisateur vers la nouvelle page de confirmation
            window.location.href = "v_confirmation_suite.php";
        }
    </script>
</div>
<br><br><br>
            <form action="../C/c_modif_infos_loc.php" method="post">
                <!-- Champs de formulaire avec les valeurs actuelles du locataire -->
                <label for="nom_loc">Nom:</label>
                <input type="text" id="nom_loc" name="nom_loc" value="<?= $locataireInfos['nom_loc'] ?>">

                <label for="prenom_loc">Prénom:</label>
                <input type="text" id="prenom_loc" name="prenom_loc" value="<?= $locataireInfos['prenom_loc'] ?>">

                <label for="date_naissance">Date de naissance:</label>
                <input type="text" id="date_naissance" name="date_naissance" value="<?= $locataireInfos['date_naissance'] ?>">

                <label for="telephone_loc">Téléphone:</label>
                <input type="text" id="telephone_loc" name="telephone_loc" value="<?= $locataireInfos['telephone_loc'] ?>">

                <label for="numCompt_loc">Numéro de compte:</label>
                <input type="text" id="numCompt_loc" name="numCompt_loc" value="<?= $locataireInfos['numCompt_loc'] ?>">

                <label for="banque">Banque:</label>
                <input type="text" id="banque" name="banque" value="<?= $locataireInfos['banque'] ?>">

                <label for="adresse_banque_loc">Adresse de la banque:</label>
                <input type="text" id="adresse_banque_loc" name="adresse_banque_loc" value="<?= $locataireInfos['adresse_banque_loc'] ?>">

                <label for="cp_banque_loc">Code postal de la banque:</label>
                <input type="text" id="cp_banque_loc" name="cp_banque_loc" value="<?= $locataireInfos['cp_banque_loc'] ?>">

                <label for="login_loc">Login:</label>
                <input type="text" id="login_loc" name="login_loc" value="<?= $locataireInfos['login_loc'] ?>">

                <label for="mdp_loc">Mot de passe:</label>
                <input type="text" id="mdp_loc" name="mdp_loc" value="<?= $locataireInfos['mdp_loc'] ?>">

                <!-- Champ caché pour envoyer le numéro du locataire -->
                <input type="hidden" name="num_loc" value="<?= $locataireInfos['num_loc'] ?>">
                <input type="submit" name="update" value="Mettre à jour">
            </form>
        </div>
       
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