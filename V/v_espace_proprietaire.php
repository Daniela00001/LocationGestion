<?php
include '../C/c_connexionP.php';

@session_start();
if(isset($_SESSION["proprietaire"])) {
    $proprietaire = $_SESSION["proprietaire"];
    $login_prop = $proprietaire["login_prop"];
}
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page avec Menu et Image d'En-tête</title>
    <link rel="stylesheet" href="CSS/styleSessionProp.css">

</head>
<body>
    <nav>
    <div class="navbar">
        <a href="v_home_propietaire.php">Accueil</a>
        <a href="v_annonces_prop.php">Annonces</a>
        <a href="v_visites_prop.php">Visites</a>
        <a href="v_demandes_prop.php">Demandes</a>
        <a href="v_profil_proprietaire.php">Profil</a>
   <div class="haut1">  <?php echo $login_prop; ?></div>
   <form method="post" action="../C/c_connexionP.php" class="haut">
            <input type="submit" name="deconnexion" value="Déconnexion">
        </form>
        
    </nav>
   
     
    <header class="header-container">
        <img src="images/wsfgsr.png" alt="En-tête du site" class="header-image_index" width="100%" height="250px">
        
    </header>
</body>
</html>
