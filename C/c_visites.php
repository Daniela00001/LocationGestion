<?php

require '../M/Modele Visites.php';
@session_start();
$demandeur = $_SESSION["demandeur"];

$visites = Visite::getVisitesDemandeur($demandeur['num_dem']);

// Vérifie si la requête est de type POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifie si les paramètres nécessaires sont présents
    if (isset($_POST['num_apart'], $_POST['date_visite'], $_POST['num_dem'], $_POST['action'])) {
        $num_apart = $_POST['num_apart'];
        $date_visite = $_POST['date_visite'];
        $num_dem = $_POST['num_dem'];
        $action = $_POST['action'];

        // Crée une instance de la classe Visite
        $visite = new Visite($num_apart, $num_dem, $date_visite);

        if ($action === 'enregistrer') {
            // Enregistre la visite uniquement si le demandeur n'a pas déjà planifié une visite pour cet appartement
            if (!$visite->demandeurHasScheduledVisit()) {
                $result = $visite->enregistrerVisite();
            } else {
                $result = "Vous avez déjà une visite prévue pour cet appartement. <a href='../V/v_visites_demandeur.php'>Voir mes visites</a>";
            }
        } elseif ($action === 'supprimer') {
            // Supprime la visite
            $result = $visite->supprimerVisite();
            header("Location: ../V/v_visites_demandeur.php");
            exit();
        } elseif ($action === 'modifier') {
            // Met à jour la date de visite
            $nouvelle_date_visite = $_POST['nouvelle_date_visite'];
            $result = $visite->mettreAJourDateVisite($nouvelle_date_visite);
            header("Location: ../V/v_visites_demandeur.php");
        } else {
            // Retourne un message d'erreur si l'action n'est pas reconnue
            // Vous pouvez ajuster cette partie en fonction de votre logique
            echo 'Action non reconnue';
            exit;
        }

        // Affiche la réponse au client
        echo $result;
        
        // Ne pas afficher le message "Méthode non autorisée" si une action de suppression a été effectuée avec succès
        if ($action === 'supprimer') {
            exit;
        }
    } else {
        // Retourne un message d'erreur si les paramètres sont manquants
        // Vous pouvez ajuster cette partie en fonction de votre logique
        echo 'Paramètres manquants';
    }
}
?>
