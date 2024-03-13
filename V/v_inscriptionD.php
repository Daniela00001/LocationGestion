<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Propriétaire</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../V/CSS/style.css">

</head>
<body>
    <main>
        <div class="container">
            <header class="header-container">
                <img src="images/7RuV.gif" alt="En-tête du site" class="header-image_index">
                <div class="header-text">
                    <section class="presentation">
                        <p>Rejoignez la communauté Dwell dès aujourd'hui et laissez-nous vous aider à trouver votre prochain chez-vous !</p>
                    </section>
                </div>
            </header>
        </div>
    </main>
    <div class="retourBTN">
    <button class="button_index"  onclick="location.href='v_choix_inscription.php'"><i class="fas fa-arrow-left"></i> Retour</button>
    </div>
   
    <form action="../C/c_inscription_demandeur.php" method="post">
    <div class="formInscPRop">
            <div class="header-text2">
    <h2>Inscription Demandeur </h2>
    </div>
        <label for="nom_dem">Nom :</label>
        <input type="text" id="nom_dem" name="nom_dem" required>

        <label for="prenom_dem">Prénom :</label>
        <input type="text" id="prenom_dem" name="prenom_dem" required>

        <label for="adresse_dem">Adresse :</label>
        <input type="text" id="adresse_dem" name="adresse_dem" required>

        <label for="cp_dem">Code Postal :</label>
        <input type="text" id="cp_dem" name="cp_dem" required>

        <label for="telephone_dem">Téléphone :</label>
        <input type="tel" id="telephone_dem" name="telephone_dem" required>

        <label for="login_dem">Login :</label>
        <input type="text" id="login_dem" name="login_dem" required>

        <label for="mdp_dem">Mot de passe :</label>
        <input type="password" id="mdp_dem" name="mdp_dem" required>

        </div>
        <br>
        <div class="autres-boutons">
        <button class="button_index" type="submit">S'inscrire</button>
        </div>
    </form>
</body>
</html>
