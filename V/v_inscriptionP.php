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
    <div id="alerte">
        <?php echo isset($_SESSION['erreur']) ? $_SESSION['erreur'] : ''; ?>
    </div>
    <form action="../C/c_inscription_proprietaire.php" method="post" onsubmit="return validateForm()">
        <div class="formInscPRop">
            <div class="header-text2">
                <h2>Inscription Propriétaire </h2>
            </div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse" required>
            <label for="cp">Code Postal :</label>
            <input type="text" id="cp" name="cp" required>
            <label for="telephone">Téléphone :</label>
            <input type="tel" id="telephone" name="telephone" required>
            <label for="login">Login :</label>
            <input type="text" id="login" name="login" required>
            <label for="mdp">Mot de passe :</label>
            <input type="password" id="mdp" name="mdp" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Le mot de passe doit contenir au moins 8 caractères, une lettre majuscule, une lettre minuscule et un chiffre." required>
        </div>
        <br>
        <div class="autres-boutons">
            <button class="button_index" type="submit">S'inscrire</button>
        </div>
    </form>

    <script>
        // Fonction pour valider le formulaire et afficher l'alerte si nécessaire
        function validateForm() {
            var errorMessage = "<?php echo isset($_SESSION['erreur']) ? $_SESSION['erreur'] : '' ?>";
            
            if (errorMessage !== "") {
                alert(errorMessage);
                return false; // Annule la soumission du formulaire si une erreur est présente
            }
            return true; // Soumet le formulaire si aucune erreur n'est présente
        }
    </script>
</body>
</html>
