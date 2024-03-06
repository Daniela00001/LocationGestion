<?php
require '../C/param_connexion_BdD.php';
require 'Class Demande.php';

class Appartement {
    // Propriétés de la classe
    protected $num_apart;
    protected $type_apart;
    protected $prix_loc;
    protected $prix_charges;
    protected $rue;
    protected $arrondissement;
    protected $etage;
    protected $elevator;
    protected $preavis;
    protected $date_libre;
    protected $image = [];
    protected $num_prop;
    protected $details;
    protected $sqlQuery;

    // Constructeur de la classe
    public function __construct($type_apart = '', $prix_loc = '', $prix_charges = '', $rue = '', $arrondissement = '', $etage = '', $elevator = '', $preavis = '', $date_libre = '',  $image = [], $num_prop = '', $details = '') {
        $this->type_apart = $type_apart;
        $this->prix_loc = $prix_loc;
        $this->prix_charges = $prix_charges;
        $this->rue = $rue;
        $this->arrondissement = $arrondissement;
        $this->etage = $etage;
        $this->elevator = $elevator;
        $this->preavis = $preavis;
        $this->date_libre = $date_libre;
        $this->image = $image;
        $this->num_prop = $num_prop;
        $this->details = $details;
        $this->sqlQuery = ''; // Ajout de la déclaration de la propriété
    }

    // Méthode pour inscrire un nouvel appartement
    public function inscription() {
        global $conn;
    
        $conn->beginTransaction();
    
        try {
            $sql = "INSERT INTO appartement (type_apart, prix_loc, prix_charges, rue, arrondissement, etage, elevator, preavis, date_libre, num_prop, details)
                    VALUES (:type_apart, :prix_loc, :prix_charges, :rue, :arrondissement, :etage, :elevator, :preavis, :date_libre, :num_prop, :details)";
            
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':type_apart', $this->type_apart);
            $stmt->bindParam(':prix_loc', $this->prix_loc);
            $stmt->bindParam(':prix_charges', $this->prix_charges);
            $stmt->bindParam(':rue', $this->rue);
            $stmt->bindParam(':arrondissement', $this->arrondissement);
            $stmt->bindParam(':etage', $this->etage);
            $stmt->bindParam(':elevator', $this->elevator);
            $stmt->bindParam(':preavis', $this->preavis);
            $stmt->bindParam(':date_libre', $this->date_libre);
            $stmt->bindParam(':num_prop', $this->num_prop); 
            $stmt->bindParam(':details', $this->details);
    
            $stmt->execute();
    
            $this->num_prop = $conn->lastInsertId();
    
            $conn->commit();
            return $this->num_prop; // Retourne l'ID de l'appartement
        } catch (PDOException $e) {
            $conn->rollBack();
            // Journalisez ou notifiez l'erreur $e pour un débogage ultérieur
            error_log("Erreur PDO lors de l'insertion de l'appartement: " . $e->getMessage());
            return false; // Retourne false en cas d'erreur
        }
    }
    
    // Méthode pour récupérer les annonces d'un propriétaire en fonction de son ID
    public function getAnnoncesParProprietaire($proprietaire_id) {
        global $conn; // Utilise la connexion à la base de données définie dans le fichier param_connexion_BdD.php

        try {
            $sql = "SELECT * FROM appartement WHERE num_prop = :proprietaire_id";
            $stmt = $conn->prepare($sql); // Prépare une requête SQL SELECT
            $stmt->bindParam(':proprietaire_id', $proprietaire_id); // Lie les valeurs aux paramètres de la requête
            $stmt->execute(); // Exécute la requête SQL
            $annonces = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupère tous les résultats sous forme d'un tableau associatif

            return $annonces; // Retourne le tableau d'annonces
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des annonces : " . $e->getMessage(); // Affiche un message d'erreur en cas d'échec
            return []; // Retourne un tableau vide
        }
    }

    // Méthode pour supprimer un appartement
    public function supprimerAppartement($num_apart) {
        global $conn;
    
        try {
            $sql = "DELETE FROM appartement WHERE num_apart = :num_apart";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':num_apart', $num_apart);
            $stmt->execute();
    
            return true; // Succès
        } catch (PDOException $e) {
            error_log('Erreur lors de la suppression de l\'appartement : ' . $e->getMessage());
            return false; // Échec
        }
    }

    // Méthode pour modifier un appartement
    public function modifierAppartement($num_apart, $type_apart, $prix_loc, $prix_charges, $rue, $arrondissement, $etage, $elevator, $preavis, $date_libre, $details) {
        global $conn;

        try {
            $sql = "UPDATE appartement SET 
                    type_apart = :type_apart,
                    prix_loc = :prix_loc,
                    prix_charges = :prix_charges,
                    rue = :rue,
                    arrondissement = :arrondissement,
                    etage = :etage,
                    elevator = :elevator,
                    preavis = :preavis,
                    date_libre = :date_libre,
                    details = :details
                    WHERE num_apart = :num_apart";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':type_apart', $type_apart);
            $stmt->bindParam(':prix_loc', $prix_loc);
            $stmt->bindParam(':prix_charges', $prix_charges);
            $stmt->bindParam(':rue', $rue);
            $stmt->bindParam(':arrondissement', $arrondissement);
            $stmt->bindParam(':etage', $etage);
            $stmt->bindParam(':elevator', $elevator);
            $stmt->bindParam(':preavis', $preavis);
            $stmt->bindParam(':date_libre', $date_libre);
            $stmt->bindParam(':details', $details);
            $stmt->bindParam(':num_apart', $num_apart);

            $stmt->execute();
            
           

        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour de l'annonce : " . $e->getMessage();
        }
    }

    // Méthode pour récupérer le numéro de l'appartement
    public function getNumApart() {
        return $this->num_apart;
    }

    // Méthode pour récupérer toutes les annonces
    public function getAllAnnonces() {
        global $conn;

        try {
            $sql = "SELECT * FROM appartement
            WHERE num_apart NOT IN (SELECT num_apart FROM locataire)";
            $stmt = $conn->query($sql);
            $annonces = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $annonces;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des annonces : " . $e->getMessage();
            return [];
        }
    }

    // Méthode pour rechercher les appartements par type
    public function rechercherAppartementsParType($type) {
        global $conn;
    
        try {
            $sql = "SELECT * FROM appartement WHERE type_apart = :type";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
            return [];
        }
    }


    public function rechercherAppartementsParArrondissement($arrondissement) {
        global $conn;
    
        try {
            $sql = "SELECT * FROM appartement WHERE arrondissement = :arrondissement";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':arrondissement', $arrondissement, PDO::PARAM_STR);
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
            return [];
        }
    }




    public function rechercherAppartementsParPrixMax($prixMax) {
        global $conn;
    
        try {
            $sql = "SELECT * FROM appartement WHERE (prix_loc + prix_charges) <= :prixMax";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':prixMax', $prixMax, PDO::PARAM_INT);
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
            return [];
        }
    }
    public function rechercherAppartementsParTypeEtArrondissement( $arrondissement,$type) {
        global $conn;
        
        try {
            $sql = "SELECT * FROM appartement WHERE arrondissement = :arrondissement AND type_apart = :type";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':arrondissement', $arrondissement, PDO::PARAM_STR);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
           
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
            return [];
        }
    }
    public function rechercherAppartementsAvecCritere($sql, $params) {
        global $conn;
    
        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
            $annonces = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $annonces;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return [];
        }
    }
    public function rechercherAppartementsParTypeEtPrixMax($type, $prixMax) {
        global $conn;
    
        try {
            $sql = "SELECT * FROM appartement WHERE type_apart = :type AND (prix_loc + prix_charges) <= :prixMax";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->bindParam(':prixMax', $prixMax, PDO::PARAM_INT);
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
            return [];
        }
    }
    public function rechercherAppartementsParArrondissementEtPrixMax($arrondissement, $prixMax) {
        global $conn;
        
        try {
            $sql = "SELECT * FROM appartement WHERE arrondissement = :arrondissement AND (prix_loc + prix_charges) <= :prixMax";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':arrondissement', $arrondissement, PDO::PARAM_STR);
            $stmt->bindParam(':prixMax', $prixMax, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
            return [];
        }
    }
    public function rechercherAppartementsParTypeArrondissementEtPrixMax($type, $arrondissement, $prixMax) {
        global $conn;
        
        try {
            $sql = "SELECT * FROM appartement WHERE type_apart = :type AND arrondissement = :arrondissement AND (prix_loc + prix_charges) <= :prixMax";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->bindParam(':arrondissement', $arrondissement, PDO::PARAM_STR);
            $stmt->bindParam(':prixMax', $prixMax, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
            return [];
        }
    }
        
}
?>
