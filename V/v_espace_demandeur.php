<?php
@session_start();

if(isset($_SESSION["demandeur"])) {
    $demandeur = $_SESSION["demandeur"];
    $login_demandeur = $demandeur["login_dem"];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page avec Menu et Image d'En-tête</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styleSessionDem.css">
</head>
<body>
    
<nav>
    <div class="navbar">
        <a href="v_home_demandeur.php">Accueil</a>
        <a href="v_annonces_dem.php">Annonces</a>
        <a href="v_visites_demandeur.php">Visites</a>
        <a href="v_demandes_Demandeur.php">Demandes</a>
        <a href="v_profil_demandeur.php">Profil</a>
        <a href="#" onclick="openModal()">&#128269;</a>
        <div class="haut1"><?php echo $login_demandeur; ?></div>
        <form method="post" action="../C/c_connexionD.php" class="haut">
            <input type="submit" name="deconnexion" value="Déconnexion" class="btn-deconnexion">
        </form>
    </div>
</nav>

<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <label for="typeSelect">Type:</label>
        <select id="typeSelect" onchange="updateType()">
            <option value="">Sélectionner un type</option>
            <option value="Studio">Studio</option>
            <option value="Maison">Maison</option>
            <option value="Pantahouse">Pantahouse</option>
            <option value="T1">T1</option>
            <option value="T2">T2</option>
        </select>
        <label for="arrondissementSelect">Arrondissement:</label>
        <select id="arrondissementSelect">
            <option value="">Sélectionner un arrondissement</option>
            <?php
            // Liste des arrondissements
            $arrondissements = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20");
            foreach ($arrondissements as $arrondissement) {
                echo "<option value='$arrondissement'>$arrondissement</option>";
            }
            ?>
        </select>
        <label for="prixMax">Prix max :</label>
        <input type="number" id="prixMax" name="prixMax">

        <div id="selectedType"></div>

        <button onclick="performSearch()">Rechercher</button>
    </div>
</div>

<header class="header-container">
    <img src="images/wsfgsr.png" alt="En-tête du site" class="header-image_index" width="100%" height="250px">
</header>

<script>
    var modalLink = document.querySelector(".navbar a[href='#']");
    var modal = document.getElementById("modal");

    modalLink.addEventListener("click", function(event) {
        event.preventDefault();
        modal.style.display = "block";
    });

    function closeModal() {
        modal.style.display = "none";
    }

    function updateType() {
        var selectedType = document.getElementById("typeSelect").value;
        document.getElementById("selectedType").innerText = selectedType;
    }

    function performSearch() {
        var selectedType = document.getElementById("typeSelect").value;
        var arrondissement = document.getElementById("arrondissementSelect").value;
        var prixMax = document.getElementById("prixMax").value;

        if (selectedType || arrondissement || prixMax) {
            var searchParams = new URLSearchParams();
            if (selectedType) {
                searchParams.append("type", selectedType);
            }
            if (arrondissement) {
                searchParams.append("arrondissement", arrondissement);
            }
            if (prixMax) {
                searchParams.append("prixMax", prixMax);
            }
            var queryString = searchParams.toString();
            var searchUrl = "../C/c_rechercheDemandeur.php";
            if (queryString) {
                searchUrl += "?" + queryString;
            }
            window.location.href = searchUrl;
        } else {
            alert("Veuillez sélectionner un type, saisir un arrondissement, ou spécifier une fourchette de prix avant de rechercher.");
        }
    }
</script>
<style>
</style>
</body>
</html>
