<?php
require '../C/param_connexion_BdD.php'; // Inclut le fichier de paramètres de connexion à la base de données

class Proprietaire {
    protected $num_prop;
    protected $nom_prop;
    protected $prenom_prop;
    protected $adresse_prop;
    protected $cp_prop;
    protected $telephone_prop;
    protected $login_prop;
    protected $mdp_prop;
    protected $maConnexion; 

    // Constructeur de la classe
    public function __construct($nom_prop = '', $prenom_prop = '', $adresse_prop = '', $cp_prop = '', $telephone_prop = '', $login_prop = '', $mdp_prop = '') {
        // Initialise les propriétés de la classe avec les valeurs fournies
        $this->nom_prop = $nom_prop;
        $this->prenom_prop = $prenom_prop;
        $this->adresse_prop = $adresse_prop;
        $this->cp_prop = $cp_prop;
        $this->telephone_prop = $telephone_prop;
        $this->login_prop = $login_prop;
        $this->mdp_prop = $mdp_prop;
    }
    
    // Méthode pour inscrire un nouveau propriétaire dans la base de données
    public function inscription() {
        global $conn;
        $conn->beginTransaction();
    
        try {
            $sql = "INSERT INTO proprietaire (nom_prop, prenom_prop, adresse_prop, cp_prop, telephone_prop, login_prop, mdp_prop) 
                    VALUES (:nom_prop, :prenom_prop, :adresse_prop, :cp_prop, :telephone_prop, :login_prop, :mdp_prop)";
            
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom_prop', $this->nom_prop);
            $stmt->bindParam(':prenom_prop', $this->prenom_prop);
            $stmt->bindParam(':adresse_prop', $this->adresse_prop);
            $stmt->bindParam(':cp_prop', $this->cp_prop);
            $stmt->bindParam(':telephone_prop', $this->telephone_prop);
            $stmt->bindParam(':login_prop', $this->login_prop);
            $stmt->bindParam(':mdp_prop', $this->mdp_prop);
          
            $stmt->execute();
    
            $this->num_prop = $conn->lastInsertId();
    
            $conn->commit();
            echo "Inscription réussie!";
            return $this->num_prop;
        } catch (PDOException $e) {
            $conn->rollBack();
            echo "Erreur lors de l'inscription : " . $e->getMessage();
        }
    }
    


    // Méthode pour vérifier l'existence d'un propriétaire en fonction du login et du mot de passe
    public static function verifierProprietaire($login, $mdp) {
        global $conn; // Utilise la connexion à la base de données définie dans le fichier param_connexion_BdD.php
        
        $query = "SELECT * FROM proprietaire WHERE login_prop = :login_prop AND mdp_prop = :mdp_prop";
        $stmt = $conn->prepare($query); // Prépare une requête SQL SELECT
        $stmt->bindParam(":login_prop", $login); // Lie les valeurs aux paramètres de la requête
        $stmt->bindParam(":mdp_prop", $mdp); // (login_prop et mdp_prop)
        $stmt->execute(); // Exécute la requête SQL

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        

        if ($row) {
            $proprietaire = new Proprietaire();
            $proprietaire->num_prop = $row['num_prop'];
            $proprietaire->nom_prop = $row['nom_prop'];
            $proprietaire->prenom_prop = $row['prenom_prop'];
            $proprietaire->adresse_prop = $row['adresse_prop'];
            $proprietaire->cp_prop = $row['cp_prop'];
            $proprietaire->telephone_prop = $row['telephone_prop'];
            $proprietaire->login_prop = $row['login_prop'];
            $proprietaire->mdp_prop = $row['mdp_prop'];

  
            return $proprietaire;
        } else {
            return null; // Aucun locataire trouvé
        }
    }

    public static function getProprietaireById($num_prop) {
        global $conn;
    
        $query = "SELECT * FROM proprietaire WHERE num_prop = :num_prop";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":num_prop", $num_prop);
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($row) {
            // Créer et retourner un nouvel objet Proprietaire avec les données récupérées
            return new Proprietaire(
                $row['nom_prop'],
                $row['prenom_prop'],
                $row['adresse_prop'],
                $row['cp_prop'],
                $row['telephone_prop'],
                $row['login_prop'],
                $row['mdp_prop']
            );
        } else {
            return null; // Aucun proprietaire trouvé avec cet identifiant
        }
    }
    

    public function setNumProp($num_prop) {
        $this->num_prop = $num_prop;
    }
    public function setNomProp($nom_prop) {
        $this->nom_prop = $nom_prop;
    }

    public function setPrenomProp($prenom_prop) {
        $this->prenom_prop = $prenom_prop;
    }
    public function setAdresseProp($adresse_prop) {
        $this->adresse_prop = $adresse_prop;
    }
    public function setCpProp($cp_prop) {
        $this->cp_prop = $cp_prop;
    }
    public function setTelephoneProp($telephone_prop) {
        $this->telephone_prop = $telephone_prop;
    }
    public function setLoginProp($login_prop) {
        $this->login_prop = $login_prop;
    }
    public function setMdpProp($mdp_prop) {
        $this->mdp_prop = $mdp_prop;
    }
   
    public function getNumProp() {
        return $this->num_prop;
    }

    public function getNomProp() {
        return $this->nom_prop;
    }

    public function getPrenomProp() {
        return $this->prenom_prop;
    }

    public function getAdresseProp() {
        return $this->adresse_prop;
    }

    public function getCpProp() {
        return $this->cp_prop;
    }

    public function getTelephoneProp() {
        return $this->telephone_prop;
    }

    public function getLoginProp() {
        return $this->login_prop;
    }

    public function getMdpProp() {
        return $this->mdp_prop;
    }
    
    
    public function supprimerProprietaire($num_prop) {
        global $conn; // Utilise la connexion à la base de données définie dans le fichier param_connexion_BdD.php
    
        try {
            $query = "DELETE FROM proprietaire WHERE num_prop = :num_prop";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':num_prop', $num_prop);
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
    public static function loginExiste($login) {
        global $conn;
        $query = "SELECT COUNT(*) FROM proprietaire WHERE login_prop = :login";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }

    public function updateInfo($num_prop, $nom_prop, $prenom_prop, $adresse_prop, $cp_prop, $telephone_prop, $login_prop, $mdp_prop) {
        global $conn;
    
        try {
            $sql = "UPDATE proprietaire 
                    SET nom_prop = :nom_prop, 
                        prenom_prop = :prenom_prop, 
                        adresse_prop = :adresse_prop, 
                        cp_prop = :cp_prop, 
                        telephone_prop = :telephone_prop, 
                        login_prop = :login_prop, 
                        mdp_prop = :mdp_prop 
                    WHERE num_prop = :num_prop";
    
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom_prop', $nom_prop);
            $stmt->bindParam(':prenom_prop', $prenom_prop);
            $stmt->bindParam(':adresse_prop', $adresse_prop);
            $stmt->bindParam(':cp_prop', $cp_prop);
            $stmt->bindParam(':telephone_prop', $telephone_prop);
            $stmt->bindParam(':login_prop', $login_prop);
            $stmt->bindParam(':mdp_prop', $mdp_prop);
            $stmt->bindParam(':num_prop', $num_prop);
    
            $stmt->execute();
    
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
            return false;
        }
    }
    public function recupProp() {
        global $conn; // Utilise la connexion à la base de données définie dans le fichier param_connexion_BdD.php
    
        try {
            $sql = "SELECT * FROM proprietaire ";
            $stmt = $conn->prepare($sql); // Prépare une requête SQL SELECT
            $stmt->execute(); // Exécute la requête SQL
            $proprietaires = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupère toutes les lignes de résultat sous forme d'un tableau associatif
            return $proprietaires; // Retourne le tableau d'annonces
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des annonces : " . $e->getMessage(); // Affiche un message d'erreur en cas d'échec
            return []; // Retourne un tableau vide
        }
    }


    public static function fromArrayToObject($info) {
        // Crée un nouvel objet Proprieter
        $proprieter = new Proprietaire();
        // Attribue les valeurs du tableau aux propriétés de l'objet
        $proprieter->num_prop = $info['num_prop'];
        $proprieter->nom_prop = $info['nom_prop'];
        $proprieter->prenom_prop = $info['prenom_prop'];
        $proprieter->adresse_prop = $info['adresse_prop'];
        $proprieter->cp_prop = $info['cp_prop'];
        $proprieter->telephone_prop = $info['telephone_prop'];
        $proprieter->login_prop = $info['login_prop'];

        // Retourne l'objet  créé
        return $proprieter;
    }
}