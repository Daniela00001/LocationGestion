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
   
    <form action="../C/c_inscription_demandeur.php" method="post" onsubmit="return validateForm()">
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
        <input type="password" id="mdp_dem" name="mdp_dem" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Le mot de passe doit contenir au moins 8 caractères, une lettre majuscule, une lettre minuscule et un chiffre." required>

        </div>
        <br>
        <div class="autres-boutons">
        <button class="button_index" type="submit">S'inscrire</button>
        </div>
    </form>
    <script>
        function validateForm() {
            // Récupération des valeurs des champs
            var nom = document.getElementById("nom_dem").value;
            var prenom = document.getElementById("prenom_dem").value;
            var adresse = document.getElementById("adresse_dem").value;
            var cp = document.getElementById("cp_dem").value;
            var telephone = document.getElementById("telephone_dem").value;
            var login = document.getElementById("login_dem").value;
            var mdp = document.getElementById("mdp_dem").value;

            // Validation du format du code postal (5 chiffres)
            var cpRegex = /^\d{5}$/;
            if (!cpRegex.test(cp)) {
                alert("Veuillez saisir un code postal valide (5 chiffres).");
                return false;
            }

            // Validation du format du téléphone (10 chiffres)
            var telephoneRegex = /^\d{10}$/;
            if (!telephoneRegex.test(telephone)) {
                alert("Veuillez saisir un numéro de téléphone valide (10 chiffres).");
                return false;
            }

            // Autres validations peuvent être ajoutées ici...

            // Si toutes les validations sont réussies, retourne true pour soumettre le formulaire
            return true;
        }
    </script>
</body>
</html>
