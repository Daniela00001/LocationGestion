<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../V/CSS/style.css">
    <style>
        .error-message {
            display: none;
            color: red;
        }
    </style>
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
        <button class="button_index" onclick="location.href='v_choix_connexion.php'"><i class="fas fa-arrow-left"></i> Retour</button>
    </div>

    <form id="loginForm" action="../C/c_connexionP.php" method="POST">
        <div class="formInscPRop">
            <div class="header-text2">
                <h2>Connexion Proprietaire</h2>
            </div>
            <!-- Bloc pour afficher le message d'erreur -->
            <div id="errorMessage" class="error-message"><?php echo isset($_SESSION["message"]) ? $_SESSION["message"] : ''; ?></div>

            <label for="login">Login :</label>
            <input type="text" id="login" name="login" required>

            <label for="mdp_prop">Mot de passe :</label>
            <input type="password" id="mdp_prop" name="mdp_prop" required>
        
            <div class="autres-boutons">
                <!-- Appel à une fonction JavaScript pour valider le formulaire -->
                <button class="button_index" type="button" onclick="validateForm()">Se connecter</button>
            </div>
        </div>
    </form>

    <script>
        function validateForm() {
            var login = document.getElementById("login").value;
            var password = document.getElementById("mdp_prop").value;

            // Vérifier si les champs sont vides
            if (login.trim() === "" || password.trim() === "") {
                document.getElementById("errorMessage").innerText = "Veuillez remplir tous les champs.";
                document.getElementById("errorMessage").style.display = "block";
                return;
            }

            // Si tout va bien, soumettre le formulaire
            document.getElementById("loginForm").submit();
        }
    </script>
</body>
</html>
