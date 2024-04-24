<?php
require '../M/Modele Visites.php';
require_once '../M/Modele  Appartement.php';
require_once '../M/Modele  Demandeur.php';

@session_start();

// Vérifie si l'objet Demandeur est présent dans la session
if(isset($_SESSION["demandeur"])) {
    // Récupère l'objet Demandeur depuis la session
    $demandeur = $_SESSION["demandeur"];

    // Récupère le numéro du demandeur
    $num_dem = $demandeur->getNumDem();

    // Récupère les visites du demandeur en utilisant le numéro du demandeur
    $visites = Visite::getVisitesDemandeur($num_dem);

    // Vérifie si la requête est de type POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifie si les paramètres nécessaires sont présents
        if (isset($_POST['num_apart'], $_POST['date_visite'], $_POST['action'])) {
            $num_apart = $_POST['num_apart'];
            $date_visite = $_POST['date_visite'];
            $action = $_POST['action'];

            // Crée une instance de la classe Visite avec les données reçues en POST
            $visite = new Visite();
            $visite->setNumApart($num_apart);
            $visite->setNumDem($demandeur->getNumDem()); // Utilise la méthode appropriée pour récupérer le numéro du demandeur
            $visite->setDateVisite($date_visite);
            
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
            echo 'Paramètres manquants';
        }
    }
} else {
    // Gérez le cas où l'objet Demandeur n'est pas présent dans la session
    echo "Objet Demandeur non trouvé dans la session.";
}

?>
