<?php
require_once '../M/Modele  Appartement.php';
require_once '../M/Modele  Demande.php';
require_once '../M/Modele  Proprietaire.php';
require_once '../M/Modele  Demandeur.php';
require_once '../M/Modele  Locataire.php';
require_once '../M/Modele Visites.php';

$appartement = new Appartement(); // Instanciation de la classe Appartement
$annonces = $appartement->recupAppart(); // Appel de la méthode recupAppart()


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if(isset($_POST['action'])) {
        if ($_POST['action'] == 'supprimerAppartement') {
            // Vérification de la présence du numéro d'appartement à supprimer
            if(isset($_POST['num_apart'])) {
                $num_apart = $_POST['num_apart'];
                // Suppression de l'appartement avec le numéro spécifié
                $success = $appartement->supprimerAppartement($num_apart);

                if ($success) {
                    
                    header("Location: ../V/v_espace_admin.php");
                    exit;
                } else {
                    // Gestion de l'échec de suppression
                    echo "Une erreur s'est produite lors de la suppression de l'appartement.";
                }
            } else {
                // Numéro d'appartement manquant
                echo "Le numéro d'appartement à supprimer est manquant.";
            }
        } elseif ($_POST['action'] == 'modifierAppartement') {
            // Vérification de la présence des données pour la modification
            if(isset($_POST['num_apart'], $_POST['type_apart'], $_POST['prix_loc'], $_POST['prix_charges'], $_POST['rue'], $_POST['arrondissement'], $_POST['etage'], $_POST['elevator'], $_POST['preavis'], $_POST['date_libre'], $_POST['details'])) {
                // Récupération des données du formulaire
                $num_apart = $_POST['num_apart'];
                $type_apart = $_POST['type_apart'];
                $prix_loc = $_POST['prix_loc'];
                $prix_charges = $_POST['prix_charges'];
                $rue = $_POST['rue'];
                $arrondissement = $_POST['arrondissement'];
                $etage = $_POST['etage'];
                $elevator = $_POST['elevator'];
                $preavis = $_POST['preavis'];
                $date_libre = $_POST['date_libre'];
                $details = $_POST['details'];

                // Modification de l'appartement avec les données spécifiées
                $success = $appartement->modifierAppartement($num_apart, $type_apart, $prix_loc, $prix_charges, $rue, $arrondissement, $etage, $elevator, $preavis, $date_libre, $details);

                    header("Location: ../V/v_espace_admin.php");
        }
    }}
}



$proprietaire = new Proprietaire(); // Instanciation de la classe Appartement
$proprietaires = $proprietaire->recupProp(); // Appel de la méthode recupAppart()


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification de l'action à effectuer
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'supprimerProprietaire') {
            // Vérification de la présence du numéro du propriétaire à supprimer
            if (isset($_POST['num_prop'])) {
                $num_prop = $_POST['num_prop'];
                // Suppression du propriétaire avec le numéro spécifié
                $success = $proprietaire->supprimerProprietaire($num_prop);

                if ($success) {
                    // Redirection vers la même page après la suppression réussie
                    header("Location: ../V/v_espace_admin.php");
                    exit;
                } else {
                    // Gestion de l'échec de suppression
                    echo "Une erreur s'est produite lors de la suppression du propriétaire.";
                }
            } else {
                // Numéro du propriétaire manquant
                echo "Le numéro du propriétaire à supprimer est manquant.";
            }
        } elseif ($_POST['action'] == 'modifierProprietaire') {
            // Vérification de la présence des données pour la modification
            if (isset($_POST['num_prop'], $_POST['nom_prop'], $_POST['prenom_prop'], $_POST['adresse_prop'], $_POST['cp_prop'], $_POST['telephone_prop'], $_POST['login_prop'], $_POST['mdp_prop'])) {
                // Récupération des données du formulaire
                $num_prop = $_POST['num_prop'];
                $nom_prop = $_POST['nom_prop'];
                $prenom_prop = $_POST['prenom_prop'];
                $adresse_prop = $_POST['adresse_prop'];
                $cp_prop = $_POST['cp_prop'];
                $telephone_prop = $_POST['telephone_prop'];
                $login_prop = $_POST['login_prop'];
                $mdp_prop = $_POST['mdp_prop'];

                // Modification du propriétaire avec les données spécifiées
                $success = $proprietaire->updateInfo($num_prop, $nom_prop, $prenom_prop, $adresse_prop, $cp_prop, $telephone_prop, $login_prop, $mdp_prop);

                if ($success) {
                    // Redirection vers la même page après la modification réussie
                    header("Location: ../V/v_espace_admin.php");
                    exit;
                } else {
                    // Gestion de l'échec de modification
                    echo "Une erreur s'est produite lors de la modification du propriétaire.";
                }
            } else {
                // Données manquantes pour la modification
                echo "Certaines données nécessaires pour la modification du propriétaire sont manquantes.";
            }
        }
    }
}




$demandeur = new Demandeur(); // Instanciation de la classe Appartement
$demandeurs = $demandeur->recupDem(); // Appel de la méthode recupAppart()


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification de l'action à effectuer
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'supprimerDemandeur') {
            // Vérification de la présence du numéro du demandeur à supprimer
            if (isset($_POST['num_dem'])) {
                $num_dem = $_POST['num_dem'];
                // Suppression du demandeur avec le numéro spécifié
                $success = $demandeur->supprimerDemandeur($num_dem);

                if ($success) {
                    // Redirection vers la même page après la suppression réussie
                    header("Location: ../V/v_espace_admin.php");
                    exit;
                } else {
                    // Gestion de l'échec de suppression
                    echo "Une erreur s'est produite lors de la suppression du demandeur.";
                }
            } else {
                // Numéro du demandeur manquant
                echo "Le numéro du demandeur à supprimer est manquant.";
            }
        } elseif ($_POST['action'] == 'modifierDemandeur') {
            // Vérification de la présence des données pour la modification
            if (isset($_POST['num_dem'], $_POST['nom_dem'], $_POST['prenom_dem'], $_POST['adresse_dem'], $_POST['cp_dem'], $_POST['telephone_dem'], $_POST['login_dem'], $_POST['mdp_dem'])) {
                // Récupération des données du formulaire
                $num_dem = $_POST['num_dem'];
                $nom_dem = $_POST['nom_dem'];
                $prenom_dem = $_POST['prenom_dem'];
                $adresse_dem = $_POST['adresse_dem'];
                $cp_dem = $_POST['cp_dem'];
                $telephone_dem = $_POST['telephone_dem'];
                $login_dem = $_POST['login_dem'];
                $mdp_dem = $_POST['mdp_dem'];

                // Modification du demandeur avec les données spécifiées
                $success = $demandeur->updateInfo($num_dem, $nom_dem, $prenom_dem, $adresse_dem, $cp_dem, $telephone_dem, $login_dem, $mdp_dem);

                if ($success) {
                    // Redirection vers la même page après la modification réussie
                    header("Location: ../V/v_espace_admin.php");
                    exit;
                } else {
                    // Gestion de l'échec de modification
                    echo "Une erreur s'est produite lors de la modification du demandeur.";
                }
            } else {
                // Données manquantes pour la modification
                echo "Certaines données nécessaires pour la modification du demandeur sont manquantes.";
            }
        }
    }
}


                





$locataire = new Locataire(); // Instanciation de la classe Appartement
$locataires = $locataire->recupLoc(); // Appel de la méthode recupAppart()





$visite = new Visite(); // Instanciation de la classe Appartement
$visites = $visite->recupVisite(); // Appel de la méthode recupAppart()
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification de l'action à effectuer
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'supprimerVisite') {
            // Vérification de la présence des données pour la suppression de la visite
            if (isset($_POST['num_apart'], $_POST['num_dem'], $_POST['date_visite'])) {
                // Récupération des données de la visite à supprimer
                $num_apart = $_POST['num_apart'];
                $num_dem = $_POST['num_dem'];
                $date_visite = $_POST['date_visite'];
                
                // Suppression de la visite avec les données spécifiées
                $success = $visite->supprimerVisite($num_apart, $num_dem, $date_visite);

                if ($success) {
                    // Redirection vers la même page après la suppression réussie
                    header("Location: ../V/v_espace_admin.php");
                    exit;
                } else {
                    // Gestion de l'échec de suppression
                    echo "Une erreur s'est produite lors de la suppression de la visite.";
                }
            } else {
                // Données manquantes pour la suppression
                echo "Certaines données nécessaires pour la suppression de la visite sont manquantes.";
            }
        } elseif ($_POST['action'] == 'modifierVisite') {
            // Vérification de la présence des données pour la modification de la visite
            if (isset($_POST['num_apart'], $_POST['num_dem'], $_POST['date_visite'], $_POST['status'])) {
                // Récupération des données de la visite à modifier
                $num_apart = $_POST['num_apart'];
                $num_dem = $_POST['num_dem'];
                $date_visite = $_POST['date_visite'];
                $status = $_POST['status'];

                // Modification de la visite avec les données spécifiées
                $success = $visite->modifierVisite($num_apart, $num_dem, $date_visite, $status);

                if ($success) {
                    // Redirection vers la même page après la modification réussie
                    header("Location: ../V/v_espace_admin.php");
                    exit;
                } else {
                    // Gestion de l'échec de modification
                    echo "Une erreur s'est produite lors de la modification de la visite.";
                }
            } else {
                // Données manquantes pour la modification
                echo "Certaines données nécessaires pour la modification de la visite sont manquantes.";
            }
        }
    }
}



?>
