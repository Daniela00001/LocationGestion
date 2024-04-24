<?php
include 'v_espace_demandeur.php';
require_once '../M/Modele  Locataire.php'; // Inclure la classe Locataire ici
@session_start();

// Vérifier si l'objet Demandeur est présent dans la session
if (isset($_SESSION["demandeur"])) {
    $demandeur = $_SESSION["demandeur"];

    // Récupérer les informations du demandeur
    $demandeur_data = isset($demandeur_data) ? $demandeur_data : $demandeur;

    ?>
    <br>
    <br>
    <link rel="stylesheet" href="CSS/styleSessionDem.css">

    <h2>Inscription Locataire</h2>
    <div class="center-container">
        <form id="inscription_locataire_form" action="../C/c_inscription_locataire.php" method="post">
            <label for="nom_loc">Nom :</label>
            <input type="text" id="nom_loc" name="nom_loc" required>

            <label for="prenom_loc">Prénom :</label>
            <input type="text" id="prenom_loc" name="prenom_loc" required>

            <label for="date_naissance">Date de naissance :</label>
            <input type="date" id="date_naissance" name="date_naissance" required>

            <label for="telephone_loc">Telephone :</label>
            <input type="tel" id="telephone_loc" name="telephone_loc" required>

            <label for="numCompt_loc">Numero Complet :</label>
            <input type="text" id="numCompt_loc" name="numCompt_loc" required>

            <label for="banque">Banque :</label>
            <input type="text" id="banque" name="banque" required>

            <label for="adresse_banque_loc">Adresse de la Banque :</label>
            <input type="text" id="adresse_banque_loc" name="adresse_banque_loc" required>

            <label for="cp_banque_loc">Cp Banque :</label>
            <input type="text" id="cp_banque_loc" name="cp_banque_loc" required>

            <label for="login_loc">Login :</label>
            <input type="text" id="login_loc" name="login_loc" required>

            <label for="mdp_loc">Mot de passe :</label>
            <input type="password" id="mdp_loc" name="mdp_loc" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Le mot de passe doit contenir au moins 8 caractères, une lettre majuscule, une lettre minuscule et un chiffre." required>

            <input type="hidden" name="num_apart" value="<?php echo isset($_POST['num_apart']) ? $_POST['num_apart'] : (isset($_SESSION['num_apart']) ? $_SESSION['num_apart'] : ''); ?>">

            <input type="hidden" name="num_dem" value="<?php echo $demandeur_data->getNumDem(); ?>">

            <?php
            // Affichage du message d'erreur s'il est défini dans la session
            if (isset($_SESSION['erreur'])) {
                echo '<div class="alert alert-danger">' . $_SESSION['erreur'] . '</div>';
                unset($_SESSION['erreur']); // Supprime le message d'erreur de la session après l'avoir affiché
            }
            ?>
            <div class="autres-bouttons">
                <button type="submit">S'inscrire</button>
            </div>
        </form>
    </div>
<?php
} else {
    // Gérer le cas où l'objet Demandeur n'est pas présent dans la session
    echo "Objet Demandeur non trouvé dans la session.";
}
?>
