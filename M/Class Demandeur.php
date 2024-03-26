<?php
require '../C/param_connexion_BdD.php'; 

class Demandeur {
    protected $num_dem;
    protected $nom_dem;
    protected $prenom_dem;
    protected $adresse_dem;
    protected $cp_dem;
    protected $telephone_dem;
    protected $login_dem;
    protected $mdp_dem;

    // Constructeur de la classe
    public function __construct($nom_dem = '', $prenom_dem = '', $adresse_dem = '', $cp_dem = '', $telephone_dem = '', $login_dem = '', $mdp_dem = '') {
        // Initialise les propriétés de la classe avec les valeurs fournies
        $this->nom_dem = $nom_dem;
        $this->prenom_dem = $prenom_dem;
        $this->adresse_dem = $adresse_dem;
        $this->cp_dem = $cp_dem;
        $this->telephone_dem = $telephone_dem;
        $this->login_dem = $login_dem;
        $this->mdp_dem = $mdp_dem;
    }

    // Méthode pour inscrire un nouveau demandeur dans la base de données
    public function inscription() {
        global $conn; // Utilise la connexion à la base de données définie dans le fichier param_connexion_BdD.php
        $conn->beginTransaction(); // Démarre une transaction

        try {
            $sql = "INSERT INTO demandeur (nom_dem, prenom_dem, adresse_dem, cp_dem, telephone_dem, login_dem, mdp_dem)
                    VALUES (:nom, :prenom, :adresse, :cp, :telephone, :login, :mdp)";
            
            $stmt = $conn->prepare($sql); // Prépare une requête SQL
            $stmt->bindParam(':nom', $this->nom_dem);
            $stmt->bindParam(':prenom', $this->prenom_dem);
            $stmt->bindParam(':adresse', $this->adresse_dem); 
            $stmt->bindParam(':cp', $this->cp_dem); 
            $stmt->bindParam(':telephone', $this->telephone_dem); 
            $stmt->bindParam(':login', $this->login_dem); 
            $stmt->bindParam(':mdp', $this->mdp_dem); 
            // (répéter pour les autres paramètres)
            $stmt->execute(); // Exécute la requête SQL

            $this->num_dem = $conn->lastInsertId(); // Récupère l'ID du dernier élément inséré

            $conn->commit(); // Valide la transaction
            echo "Inscription réussie!"; // Affiche un message de succès
            return $this->num_dem; // Retourne l'ID du demandeur inscrit
        } catch (PDOException $e) {
            $conn->rollBack(); // Annule la transaction en cas d'erreur
            echo "Erreur lors de l'inscription : " . $e->getMessage(); // Affiche un message d'erreur
        }
    }


    // Méthode pour vérifier l'existence d'un demandeur en fonction du login et du mot de passe
    public function verifierDemandeur($login, $mdp) {
        global $conn; // Utilise la connexion à la base de données définie dans le fichier param_connexion_BdD.php
        
        $query = "SELECT * FROM demandeur WHERE login_dem = :login AND mdp_dem = :mdp";
        $stmt = $conn->prepare($query); // Prépare une requête SQL SELECT
        $stmt->bindParam(":login", $login); // Lie les valeurs aux paramètres de la requête
        $stmt->bindParam(":mdp", $mdp); // (login_dem et mdp_dem)
        $stmt->execute(); // Exécute la requête SQL

        return $stmt->fetch(PDO::FETCH_ASSOC); // Renvoie les résultats de la requête sous forme d'array associatif
    }

    // Méthode pour récupérer toutes les annonces d'appartements
    public function getAllAnnonces() {
        global $conn; // Utilise la connexion à la base de données définie dans le fichier param_connexion_BdD.php
    
        try {
            $query = "SELECT * FROM appartement";
            $stmt = $conn->query($query); // Exécute une requête SQL
            $annonces = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupère tous les résultats sous forme d'un tableau associatif
    
            return $annonces; // Retourne le tableau d'annonces
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des annonces : " . $e->getMessage(); // Affiche un message d'erreur en cas d'échec
            return []; // Retourne un tableau vide
        }
    }

    // Méthode statique pour récupérer un demandeur en fonction de son numéro
    public static function getDemandeurById($num_dem) {
        global $conn; // Utilise la connexion à la base de données définie dans le fichier param_connexion_BdD.php

        $query = "SELECT * FROM demandeur WHERE num_dem = :num_dem";
        $stmt = $conn->prepare($query); // Prépare une requête SQL SELECT
        $stmt->bindParam(":num_dem", $num_dem); // Lie les valeurs aux paramètres de la requête
        $stmt->execute(); // Exécute la requête SQL

        return $stmt->fetch(PDO::FETCH_ASSOC); // Renvoie les résultats de la requête sous forme d'array associatif
    }

    public function setNomDem($nom) {
        $this->nom_dem = $nom;
    }
    public function setNumDem($num_dem) {
        $this->num_dem = $num_dem;
    }
    // Méthode pour mettre à jour le prénom du demandeur
    public function setPrenomDem($prenom) {
        $this->prenom_dem = $prenom;
    }
    public function setCpDem($cp) {
        $this->cp_dem = $cp;
    }
    public function setTelephoneDem($telephone) {
        $this->telephone_dem = $telephone;
    }
    public function setLoginDem($login) {
        $this->login_dem = $login;
    }
    public function setMdpDem($mdp) {
        $this->mdp_dem = $mdp;
    }
    // Méthode pour mettre à jour l'adresse du demandeur
    public function setAdresseDem($adresse) {
        $this->adresse_dem = $adresse;
    }

    // ... Autres méthodes pour les autres propriétés

    // Méthode pour mettre à jour les informations du demandeur
    public function updateInfo($num_dem, $nom_dem, $prenom_dem, $adresse_dem, $cp_dem, $telephone_dem, $login_dem, $mdp_dem) {
        global $conn;
    
        try {
            $sql = "UPDATE demandeur SET nom_dem = :nom, prenom_dem = :prenom, adresse_dem = :adresse, cp_dem = :cp, telephone_dem = :telephone, login_dem = :login, mdp_dem = :mdp WHERE num_dem = :num_dem";
    
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom', $nom_dem);
            $stmt->bindParam(':prenom', $prenom_dem);
            $stmt->bindParam(':adresse', $adresse_dem);
            $stmt->bindParam(':cp', $cp_dem);
            $stmt->bindParam(':telephone', $telephone_dem);
            $stmt->bindParam(':login', $login_dem);
            $stmt->bindParam(':mdp', $mdp_dem);
            $stmt->bindParam(':num_dem', $num_dem);
         
    
            $stmt->execute();
    
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
            return false;
        }
    }

    

    public function supprimerDemandeur($num_dem) {
        global $conn; // Utilise la connexion à la base de données définie dans le fichier param_connexion_BdD.php
    
        try {
            $query = "DELETE FROM demandeur WHERE num_dem = :num_dem";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':num_dem', $num_dem);
            $stmt->execute();
    
            // Vérifier si la suppression a réussi
            if ($stmt->rowCount() > 0) {
                // Suppression réussie
                return true;
            } else {
                // Aucun enregistrement affecté, la suppression a échoué
                return false;
            }
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo "Erreur lors de la suppression du compte demandeur : " . $e->getMessage();
            return false;
        }
    }
    
    public function recupDem() {
        global $conn; // Utilise la connexion à la base de données définie dans le fichier param_connexion_BdD.php
    
        try {
            $sql = "SELECT * FROM demandeur ";
            $stmt = $conn->prepare($sql); // Prépare une requête SQL SELECT
            $stmt->execute(); // Exécute la requête SQL
            $demandeurs = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupère toutes les lignes de résultat sous forme d'un tableau associatif
            return $demandeurs; // Retourne le tableau d'annonces
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des demandeurs : " . $e->getMessage(); // Affiche un message d'erreur en cas d'échec
            return []; // Retourne un tableau vide
        }
    }
}
?>