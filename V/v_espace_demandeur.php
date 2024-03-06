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

<div class="navbar">
    <a href="v_home_demandeur.php">Accueil</a>
    <a href="v_annonces_dem.php">Annonces</a>
    <a href="v_visites_demandeur.php">Visites</a>
    <a href="v_demandes_Demandeur.php">Demandes</a>
    <a href="v_profil_demandeur.php">Profil</a>
    

    <a href="#" onclick="openModal()">&#128269;</a>
    <div class="doite login-info">
        <?php echo $login_demandeur; ?>
        <form method="post" action="../C/c_connexionD.php" class="form-deconnexion">
            <input type="submit" name="deconnexion" value="Déconnexion" class="btn-deconnexion">
        </form>
    </div>
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
        <img src="images/HD-wallpaper-artistic-city-light-scenery.jpg" alt="En-tête du site" class="header-image_index" width="100%" height="250px">
        
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

<style>

/* Style de la modal */
.modal {
    display: none; /* Par défaut, cache la modal */
    position: fixed; /* Position fixe pour rester au-dessus du contenu */
    z-index: 1; /* Place la modal au-dessus de tout le reste */
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto; /* Ajoute un défilement si le contenu est trop grand */
    background-color: rgba(0,0,0,0.4); /* Fond semi-transparent pour assombrir le contenu en arrière-plan */
}

/* Style du contenu de la modal */
.modal-content {
    background-color: #f9f9f9;
    margin: auto; /* Centre la modal horizontalement */
    position: absolute;
    left: 50%;
    top: 30%; /* Ajustez cette valeur pour déplacer la modal plus haut */
    transform: translate(-50%, -50%); /* Centre la modal verticalement */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    width: 80%;
    max-width: 600px; /* Largeur maximale de la modal */
}

/* Style pour le bouton de fermeture */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Style pour les labels */
label {
    margin-top: 10px;
    display: block;
    font-weight: bold;
}

/* Style pour les inputs */
input[type=text], input[type=number], select {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

/* Style pour le bouton de recherche */
button {
    background-color: #7d26cd;
    color: white;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 20px;
    width: 100%;
}

button:hover {
    background-color: #596a99ff;
}


</style>