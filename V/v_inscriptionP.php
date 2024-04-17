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
                <img src="images/abstra.png" alt="En-tête du site" class="header-image_index">
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
            <input type="text" id="login" name="login" pattern=".{5,}" title="Le login doit contenir au moins 5 caractères" required>
            <label for="mdp">Mot de passe :</label>
            <input type="password" id="mdp" name="mdp" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Le mot de passe doit contenir au moins 8 caractères, une lettre majuscule, une lettre minuscule et un chiffre." required>
        </div>
        <br>
        <div class="autres-boutons">
            <button class="button_index" type="submit">S'inscrire</button>
        </div>
    </form>

    <script>
        // Affiche une alerte si une erreur est présente dans la session
        window.onload = function() {
            <?php if (isset($_SESSION['erreur'])): ?>
                alert("<?php echo $_SESSION['erreur']; ?>");
                <?php unset($_SESSION['erreur']); ?>
            <?php endif; ?>
        };
        
        function validateForm() {
            var telephone = document.getElementById("telephone").value;
            var cp = document.getElementById("cp").value;

            // Vérification du numéro de téléphone
            var telephoneRegex = /^\d{10}$/; // 10 chiffres exactement
            if (!telephoneRegex.test(telephone)) {
                alert("Veuillez entrer un numéro de téléphone valide.");
                return false;
            }

            // Vérification du code postal
            var cpRegex = /^\d{5}$/; // 5 chiffres exactement
            if (!cpRegex.test(cp)) {
                alert("Veuillez entrer un code postal valide.");
                return false;
            }

          

            return true; // Soumet le formulaire si toutes les validations sont passées
        }
    </script>

</body>
</html>
