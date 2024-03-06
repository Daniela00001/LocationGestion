<?php 
include 'v_espace_demandeur.php';
include '../C/c_inscription_locataire.php'; 
@session_start();

?>
<link rel="stylesheet" href="CSS/styleSessionDem.css">
   
<h2>Inscription Locataire</h2>
<form id="inscription_locataire_form" action="../C/c_inscription_locataire.php" method="post">      
    <label for="nom_loc">Nom :</label>
    <input type="text" id="nom_loc" name="nom_loc" required>

    <label for="prenom_loc">Prénom :</label>
    <input type="text" id="prenom_loc" name="prenom_loc" required>

    <label for="date_naissance">Date de naissance :</label>
    <input type="date" id="date_naissance" name="date_naissance" required>

    <label for="telephone_loc">Telephone :</label>
    <input type="tel" id="telephone_loc" name="telephone_loc" required>

    <label for="numCompt_loc">Numero Complet :</label>
    <input type="text" id="numCompt_loc" name="numCompt_loc" required>

    <label for="banque">Banque :</label>
    <input type="text" id="banque" name="banque" required>

    <label for="adresse_banque_loc">Adresse de la Banque :</label>
    <input type="text" id="adresse_banque_loc" name="adresse_banque_loc" required>

    <label for="cp_banque_loc">Cp Banque :</label>
    <input type="text" id="cp_banque_loc" name="cp_banque_loc" required>

    <label for="login_loc">Login :</label>
    <input type="text" id="login_loc" name="login_loc" required>

    <label for="mdp_loc">Mot de passe :</label>
    <input type="password" id="mdp_loc" name="mdp_loc" required>

    <input type="text" name="num_apart" value="<?php echo isset($_POST['num_apart']) ? $_POST['num_apart'] : (isset($_SESSION['num_apart']) ? $_SESSION['num_apart'] : ''); ?>">
    <input type="text" name="num_dem" value="<?php echo isset($_POST['num_dem']) ? $_POST['num_dem'] : (isset($_SESSION['num_dem']) ? $_SESSION['num_dem'] : ''); ?>">

<div class="autres-boutons">
<button type="submit">S'inscrire</button>
</div>
</form>

<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Pour centrer verticalement sur toute la hauteur de la page */
    }

    form {
        width: 50%; /* Ajustez la largeur selon vos besoins */
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        color: purple; /* Couleur violette */
    }

    form label {
        display: block;
        margin-bottom: 5px;
    }

    form input[type="text"],
    form input[type="date"],
    form input[type="tel"],
    form input[type="password"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }

    .autres-boutons {
        text-align: center;
    }

    .autres-boutons button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .autres-boutons button:hover {
        background-color: #0056b3;
    }
</style>
