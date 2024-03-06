<?php require '../M/Class Appartement.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Récupération des critères de recherche depuis la requête GET
    $type = isset($_GET["type"]) ? $_GET["type"] : null;
    $arrondissement = isset($_GET["arrondissement"]) ? $_GET["arrondissement"] : null;
    $prixMax = isset($_GET["prixMax"]) ? $_GET["prixMax"] : null;

    $appartement = new Appartement();
    $annonces = [];

    // Recherche par type, arrondissement et prix maximum
    if ($type && $arrondissement && $prixMax) {
        $annonces = $appartement->rechercherAppartementsParTypeArrondissementEtPrixMax($type, $arrondissement, $prixMax);
    } else {
        // Recherche par type et arrondissement
        if ($type && $arrondissement) {
            $annonces = $appartement->rechercherAppartementsParTypeEtArrondissement($arrondissement, $type);
        } else {
            if ($type) {
                $annonces = $appartement->rechercherAppartementsParType($type);
            } elseif ($arrondissement) {
                $annonces = $appartement->rechercherAppartementsParArrondissement($arrondissement);
            }
        }

        // Recherche par prix maximum
        if ($prixMax) {
            // Si des annonces sont déjà trouvées, filtrez les résultats pour ne conserver que ceux dont le prix est inférieur ou égal au prix maximum spécifié
            if (!empty($annonces)) {
                foreach ($annonces as $key => $annonce) {
                    $prixTotal = $annonce['prix_loc'] + $annonce['prix_charges'];
                    if ($prixTotal > $prixMax) {
                        unset($annonces[$key]); // Supprimez l'annonce si le prix total dépasse le prix maximum
                    }
                }
            } else {
                // Sinon, effectuez simplement la recherche par prix maximum
                $annonces = $appartement->rechercherAppartementsParPrixMax($prixMax);
            }
        }
    }

    // Redirection vers la vue de résultats de recherche en transmettant les critères et les résultats
    header("Location: ../V/v_rechercheApp.php?type=" . urlencode($type) . "&arrondissement=" . urlencode($arrondissement) . "&prixMax=" . urlencode($prixMax) . "&annonces=" . urlencode(serialize($annonces)));
    exit; // Assurez-vous de terminer le script après la redirection
}


?>
