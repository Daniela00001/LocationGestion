<?php
include '../C/c_connexionL.php';
@session_start();
if(isset($_SESSION["locataire"])) {
    $locataire = $_SESSION["locataire"];
    $login_loc = $locataire["login_loc"];
}
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page avec Menu et Image d'En-tête</title>
    <link rel="stylesheet" href="CSS/styleSessionLoc.css">

</head>
<body>
    <nav>
    <div class="navbar">
        <a href="v_home_locataire.php">Accueil</a>
        <a href="v_profil_locataire.php">Profil</a>
   <div class="haut1">  <?php echo $login_loc; ?></div>
   <form method="post" action="../C/c_connexionL.php" class="haut">
            <input type="submit" name="deconnexion" value="Déconnexion">
        </form>
        
    </nav>
   
     
    <header class="header-container">
        <img src="images/HD-wallpaper-artistic-city-light-scenery.jpg" alt="En-tête du site" class="header-image_index" width="100%" height="250px">
        
    </header>
</body>
</html>
