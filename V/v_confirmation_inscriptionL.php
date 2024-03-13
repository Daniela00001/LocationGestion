<!DOCTYPE html>
<html>
<head>
    <title>Confirmation d'inscription</title>
</head>
<body>
    <?php
    include 'v_espace_demandeur.php';

    if (isset($_SESSION["demandeur"])) {
        $demandeurInfos = $_SESSION["demandeur"];
        
        // Vérifie si les données du demandeur ont été mises à jour
        $demandeur_data = isset($demandeur_data) ? $demandeur_data : $demandeurInfos;

        ?>
    <h1>Confirmation d'inscription</h1>
    <p>Votre inscription a été effectuée avec succès.</p>
    <br>
    <h2>Profil du demandeur</h2>
    <p>Numéro du demandeur: <?php echo $demandeur_data['num_dem']; ?></p>
    <br>
    <p>Voulez-vous garder votre compte demandeur ?</p>
    <p>*Si oui, votre compte sera activé et vous pourrez toujours rechercher des appartements.</p>
    <p>*Si non, votre compte sera détruit.</p>

    <div class="autres-boutons">
        <button onclick="garderCompte()">Oui</button>
        <form action="../C/c_supDemandeur.php" method="GET">
            <input type="hidden" name="num_dem" value="<?php echo $demandeur_data['num_dem']; ?>">
            <button type="submit">Non</button>
        </form>
    </div>

    <script>
        function garderCompte() {
            // Rediriger l'utilisateur vers la nouvelle page de confirmation
            window.location.href = "v_confirmation_suite.php";
        }
    </script>
    <?php
    }
    ?>
</body>
</html>
