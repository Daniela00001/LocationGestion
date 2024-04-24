<?php
require '../C/param_connexion_BdD.php';

class Visite {
    protected $num_apart;
    protected $num_dem;
    protected $date_visite;
    protected $status;

    // Constructeur de la classe
 // Constructeur de la classe
public function __construct($num_apart='?',$num_dem = '?', $date_visite = '?', $status = '?') {
    $this->num_apart = $num_apart;
    $this->num_dem = $num_dem;
    $this->date_visite = $date_visite;
    $this->status = $status;
}

public function setNumApart($num_apart) {
    $this->num_apart = $num_apart;
}
public function setNumDem($num_dem) {
    $this->num_dem = $num_dem;
}

public function setDateVisite($date_visite) {
    $this->date_visite = $date_visite;
}

public function getdate_visiteDemande() {
    return $this->date_visite;
}

public function getNumDem() {
    return $this->num_dem;
}

public function getNumApart() {
    return $this->num_apart;
}

public function getStatutDemande() {
    return $this->status;
}
// Méthode pour enregistrer la visite dans la base de données
public function enregistrerVisite() {
    global $conn;
    
    try {
        // Aucune visite existante, procédez à l'insertion
        $sql = "INSERT INTO visiter (num_apart, num_dem, date_visite) 
                VALUES (:num_apart, :num_dem, :date_visite)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':num_apart', $this->num_apart);
        $stmt->bindParam(':num_dem', $this->num_dem);
        $stmt->bindParam(':date_visite', $this->date_visite);
        $stmt->execute();

        return "Visite enregistrée avec succès! <a href='../V/v_visites_demandeur.php'>Voir mes visites</a>";
    } catch (PDOException $e) {
        // Ajoutez des messages de débogage ici
        error_log('Erreur lors de l\'enregistrement de la visite : ' . $e->getMessage());
        return "Erreur lors de l'enregistrement de la visite : " . $e->getMessage();
    }
}


public static function getVisitesDemandeur($num_dem, $order = 'DESC') {
    global $conn;

    try {
        $sql = "SELECT visiter.*, appartement.* 
                FROM visiter
                JOIN appartement ON visiter.num_apart = appartement.num_apart
                WHERE visiter.num_dem = :num_dem
                ORDER BY visiter.date_visite $order"; // Ajout de l'ordonnancement directement dans la requête
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':num_dem', $num_dem);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (PDOException $e) {
        error_log('Erreur lors de la récupération des visites du demandeur : ' . $e->getMessage());
        return array();
    }
}
public static function supprimerVisiteProp($num_apart) {
    global $conn; // Assurez-vous que $conn est défini correctement dans votre fichier param_connexion_BdD.php

    try {
        // Préparer et exécuter la requête de suppression
        $sql = "DELETE FROM visiter WHERE num_apart = :num_apart";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':num_apart', $num_apart);
        $stmt->execute();

        // Vérifier si la suppression a réussi
        if ($stmt->rowCount() > 0) {
            return "La visite a été supprimée avec succès.";
        } else {
            return "La visite n'a pas pu être trouvée ou supprimée.";
        }
    } catch (PDOException $e) {
        // Gérer les erreurs de base de données
        return "Erreur lors de la suppression de la visite : " . $e->getMessage();
    }
} 
public function supprimerVisite() {
    global $conn;

    try {
        $sql = "DELETE FROM visiter WHERE num_apart = :num_apart AND num_dem = :num_dem";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':num_apart', $this->num_apart);
        $stmt->bindParam(':num_dem', $this->num_dem);
        $stmt->execute();

        return "Visite supprimée avec succès!";
    } catch (PDOException $e) {
        error_log('Erreur lors de la suppression de la visite : ' . $e->getMessage());
        return "Erreur lors de la suppression de la visite : " . $e->getMessage();
    }
}
public function demandeurHasScheduledVisit() {
    global $conn;

    try {
        // Vérifie si une visite existe déjà pour ce demandeur et cet appartement
        $sql_check = "SELECT COUNT(*) FROM visiter 
                      WHERE num_dem = :num_dem
                      AND num_apart = :num_apart" ;
                      
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bindParam(':num_dem', $this->num_dem);
        $stmt_check->bindParam(':num_apart', $this->num_apart);
       
        $stmt_check->execute();
        $existing_visits = $stmt_check->fetchColumn();

        return $existing_visits > 0;
    } catch (PDOException $e) {
        // Ajoutez des messages de débogage ici
        error_log('Erreur lors de la vérification des visites planifiées : ' . $e->getMessage());
        return false;
    }
}

public static function getVisitesProprietaire($num_prop) {
    global $conn;

    try {
        $sql = "SELECT visiter.*, appartement.* 
                FROM visiter
                JOIN appartement ON visiter.num_apart = appartement.num_apart
                WHERE appartement.num_prop = :num_prop";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':num_prop', $num_prop);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Ajout de lignes de débogage
        error_log('Nombre de visites récupérées pour le propriétaire ' . $num_prop . ': ' . count($result));

        return $result;
    } catch (PDOException $e) {
        error_log('Erreur lors de la récupération des visites pour le propriétaire : ' . $e->getMessage());
        return array();
    }
}

public function recupVisite() {
    global $conn; 

    try {
        $sql = "SELECT * FROM visiter ";
        $stmt = $conn->prepare($sql); // Prépare une requête SQL SELECT
        $stmt->execute(); // Exécute la requête SQL
        $visites = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupère toutes les lignes de résultat sous forme d'un tableau associatif
        return $visites; // Retourne le tableau d'annonces
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des visites : " . $e->getMessage(); // Affiche un message d'erreur en cas d'échec
        return []; // Retourne un tableau vide
    }
}
public function mettreAJourDateVisite($nouvelle_date_visite) {
    global $conn;

    try {
        $sql = "UPDATE visiter SET date_visite = :nouvelle_date_visite 
                WHERE num_apart = :num_apart AND num_dem = :num_dem";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nouvelle_date_visite', $nouvelle_date_visite);
        $stmt->bindParam(':num_apart', $this->num_apart);
        $stmt->bindParam(':num_dem', $this->num_dem);
        $stmt->execute();

        return "Date de visite mise à jour avec succès!";
    } catch (PDOException $e) {
        error_log('Erreur lors de la mise à jour de la date de visite : ' . $e->getMessage());
        return "Erreur lors de la mise à jour de la date de visite : " . $e->getMessage();
    }
}


public static function fromArrayToObject($info) {
    // Crée un nouvel objet Appartement
    $visite = new Visite();

    // Attribue les valeurs du tableau aux propriétés de l'objet
    $visite->num_apart = $info['num_apart'];
    $visite->num_dem = $info['num_dem'];
    $visite->date_visite = $info['date_visite'];
    $visite->status = $info['status'];

    // Retourne l'objet Appartement créé
    return $visite;
}
}
?>
