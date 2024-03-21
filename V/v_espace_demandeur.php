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
   <div class="haut1">  <?php echo $login_demandeur; ?></div>
   <form method="post" action="../C/c_connexionD.php" class="haut">
   <input type="submit" name="deconnexion" value="Déconnexion" class="btn-deconnexion">
        </form>
        
    </nav>
   

    
</div>

<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <label for="typeSelect">Type:</label>
        <select id="typeSelect" onchange="updateType()">
            <option value="">Sélectionner un type</option>
            <option value="Studio">Studio</option>
            <option value="T1">T1</option>
            <option value="T2">T2</option>
            <option value="T3">T3</option>
            <option value="T4">T4</option>
            <option value="T5">T5</option>
        </select>
  
        <input type="text" id="arrondissementInput" placeholder="Entrez l'arrondissement">

        <label for="prixMax">Prix max :</label>
        <input type="number" id="prixMax" name="prixMax">

        <!-- Afficher le type sélectionné -->
        <div id="selectedType"></div>

        <button onclick="performSearch()">Rechercher</button>

    </div>
</div>

<header class="header-container">
<img src="images/wsfgsr.png" alt="En-tête du site" class="header-image_index" width="100%" height="250px">
    </header>

</body>
</html>


<script>
    // Sélectionnez l'élément qui déclenche l'ouverture de la modal
    var modalLink = document.querySelector(".navbar a[href='#']");

    // Sélectionnez la modal
    var modal = document.getElementById("modal");

    // Ajoutez un écouteur d'événements pour ouvrir la modal lorsqu'on clique sur le lien
    modalLink.addEventListener("click", function(event) {
        event.preventDefault(); // Empêche le lien de suivre son URL
        modal.style.display = "block"; // Affiche la modale
    });

    // Fonction pour fermer la modal
    function closeModal() {
        modal.style.display = "none"; // Cache la modale
    }

    // Fonction pour mettre à jour le type sélectionné
    function updateType() {
        var selectedType = document.getElementById("typeSelect").value;
        document.getElementById("selectedType").innerText = selectedType;
    }

   function performSearch() {
    var selectedType = document.getElementById("typeSelect").value;
    var arrondissement = document.getElementById("arrondissementInput").value;
    var prixMax = document.getElementById("prixMax").value;

    // Vérifie si au moins un des critères est spécifié
    if (selectedType || arrondissement || prixMax) {
        // Redirige l'utilisateur vers le contrôleur de recherche avec les critères sélectionnés
        if (selectedType && arrondissement) {
            // Recherche avec les deux critères
            window.location.href = "../C/c_rechercheDemandeur.php?type=" + encodeURIComponent(selectedType) + "&arrondissement=" + encodeURIComponent(arrondissement) + "&prixMax=" + encodeURIComponent(prixMax);
        } else {
            // Recherche avec un seul critère
            window.location.href = "../C/c_rechercheDemandeur.php?type=" + encodeURIComponent(selectedType) + "&arrondissement=" + encodeURIComponent(arrondissement) + "&prixMax=" + encodeURIComponent(prixMax);
        }
    } else {
        // Aucun critère spécifié
        alert("Veuillez sélectionner un type, saisir un arrondissement, ou spécifier une fourchette de prix avant de rechercher.");
    }
}


</script>
