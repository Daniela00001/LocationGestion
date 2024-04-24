<!DOCTYPE html>
<html>
<head>
    <title>Confirmation d'inscription</title>
</head>
<body>
    <?php
    include 'v_espace_demandeur.php';

    // Vérifie si l'objet Demandeur est présent dans la session
    if (isset($_SESSION["demandeur"])) {
        // Récupérer l'objet Demandeur depuis la session
        $demandeur = $_SESSION["demandeur"];

        ?>
    <h1>Confirmation d'inscription</h1>
    <p>Votre inscription a été effectuée avec succès.</p>
    <br>
    <h2>Profil du demandeur</h2>
    <p>Numéro du demandeur: <?php echo $demandeur->getNumDem(); ?></p>
    <br>
    <p>Voulez-vous garder votre compte demandeur ?</p>
    <p>*Si oui, votre compte sera activé et vous pourrez toujours rechercher des appartements.</p>
    <p>*Si non, votre compte sera détruit.</p>

    <div class="autres-boutons">
        <button onclick="garderCompte()">Oui</button>
        <form action="../C/c_supDemandeur.php" method="GET">
            <!-- Utilisez les données de l'objet Demandeur pour passer le numéro du demandeur -->
            <input type="hidden" name="num_dem" value="<?php echo $demandeur->getNumDem(); ?>">
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
