
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<body>

<body><!DOCTYPE html>
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
    <button class="button_index"  onclick="location.href='v_choix_connexion.php'"><i class="fas fa-arrow-left"></i> Retour</button>
    </div>
    <form action="../C/c_connexionL.php" method="POST">
    <div class="formInscPRop">
            <div class="header-text2">
    <h2>Connexion Locataire </h2>
    </div>
        <label for="login_loc">Login :</label>
        <input type="text" id="login_loc" name="login_loc" required>

        <label for="mdp_loc">Mot de passe :</label>
        <input type="password" id="mdp_loc" name="mdp_loc" required>
       
    <div class="autres-boutons">
        <button class="button_index" type="submit">Se connecter</button>
    </div>
    </form>
    
</body>
</html>
