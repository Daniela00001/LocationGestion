<?php
require '../C/param_connexion_BdD.php'; // Inclut le fichier de paramètres de connexion à la base de données

class Locataire {
    protected $num_loc;
    protected $nom_loc;
    protected $prenom_loc;
    protected $date_naissance;
    protected $telephone_loc;
    protected $numCompt_loc;
    protected $banque;
    protected $adresse_banque_loc;
    protected $cp_banque_loc;
    protected $login_loc;
    protected $mdp_loc;
    protected $num_apart;
    protected $num_dem; 
    protected $maConnexion; 

    // Constructeur de la classe
    public function __construct($nom_loc = '', $prenom_loc = '', $date_naissance = '', $telephone_loc = '', $numCompt_loc = '', $banque = '', $adresse_banque_loc = '', $cp_banque_loc = '', $login_loc = '', $mdp_loc = '', $num_apart = null,$num_dem= null) {
        // Initialise les propriétés de la classe avec les valeurs fournies
        $this->nom_loc = $nom_loc;
        $this->prenom_loc = $prenom_loc;
        $this->date_naissance = $date_naissance;
        $this->telephone_loc = $telephone_loc;
        $this->numCompt_loc = $numCompt_loc;
        $this->banque = $banque;
        $this->adresse_banque_loc = $adresse_banque_loc;
        $this->cp_banque_loc = $cp_banque_loc;
        $this->login_loc = $login_loc;
        $this->mdp_loc = $mdp_loc;
        $this->num_apart = $num_apart;
        $this->num_dem = $num_dem;
    }
    
    // Méthode pour inscrire un nouveau locataire dans la base de données
    public function inscription() {
        global $conn;
        $conn->beginTransaction();
    
        try {
            $sql = "INSERT INTO locataire (nom_loc, prenom_loc, date_naissance, telephone_loc, numCompt_loc, banque, adresse_banque_loc, cp_banque_loc, login_loc, mdp_loc, num_apart,num_dem) 
                    VALUES (:nom_loc, :prenom_loc, :date_naissance, :telephone_loc, :numCompt_loc, :banque, :adresse_banque_loc, :cp_banque_loc, :login_loc, :mdp_loc, :num_apart, :num_dem)";
            
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom_loc', $this->nom_loc);
            $stmt->bindParam(':prenom_loc', $this->prenom_loc);
            $stmt->bindParam(':date_naissance', $this->date_naissance);
            $stmt->bindParam(':telephone_loc', $this->telephone_loc);
            $stmt->bindParam(':numCompt_loc', $this->numCompt_loc);
            $stmt->bindParam(':banque', $this->banque);
            $stmt->bindParam(':adresse_banque_loc', $this->adresse_banque_loc);
            $stmt->bindParam(':cp_banque_loc', $this->cp_banque_loc);
            $stmt->bindParam(':login_loc', $this->login_loc);
            $stmt->bindParam(':mdp_loc', $this->mdp_loc);
            $stmt->bindParam(':num_apart', $this->num_apart);
            $stmt->bindParam(':num_dem', $this->num_dem);
            
          
            $stmt->execute();
    
            $this->num_loc = $conn->lastInsertId();
    
            $conn->commit();
            echo "Inscription réussie!";
            return $this->num_loc;
        } catch (PDOException $e) {
            $conn->rollBack();
            echo "Erreur lors de l'inscription : " . $e->getMessage();
        }
    }

    // Méthode pour récupérer le numéro du locataire
    public function getNumLoc() {
        return $this->num_loc;
    }
    
    public function getNomLoc() {
        return $this->nom_loc;
    }
    
    public function getPrenomLoc() {
        return $this->prenom_loc;
    }
    
    public function getDateNaissance() {
        return $this->date_naissance;
    }
    
    public function getTelephoneLoc() {
        return $this->telephone_loc;
    }
    
    public function getNumComptLoc() {
        return $this->numCompt_loc;
    }
    
    public function getBanque() {
        return $this->banque;
    }
    
    public function getAdresseBanqueLoc() {
        return $this->adresse_banque_loc;
    }
    
    public function getCpBanqueLoc() {
        return $this->cp_banque_loc;
    }
    
    public function getLoginLoc() {
        return $this->login_loc;
    }
    
    public function getMdpLoc() {
        return $this->mdp_loc;
    }
    
    public function getNumDem() {
        return $this->num_dem;
    }
    
    public function setNumLoc($num_loc) {
        $this->num_loc = $num_loc;
    }
    public function setNomLoc($nom_loc) {
        $this->nom_loc = $nom_loc;
    }
    
    public function setPrenomLoc($prenom_loc) {
        $this->prenom_loc = $prenom_loc;
    }
    
    public function setDateNaissance($date_naissance) {
        $this->date_naissance = $date_naissance;
    }
    
    public function setTelephoneLoc($telephone_loc) {
        $this->telephone_loc = $telephone_loc;
    }
    
    public function setNumComptLoc($numCompt_loc) {
        $this->numCompt_loc = $numCompt_loc;
    }
    
    public function setBanque($banque) {
        $this->banque = $banque;
    }
    
    public function setAdresseBanqueLoc($adresse_banque_loc) {
        $this->adresse_banque_loc = $adresse_banque_loc;
    }
    
    public function setCpBanqueLoc($cp_banque_loc) {
        $this->cp_banque_loc = $cp_banque_loc;
    }
    
    public function setLoginLoc($login_loc) {
        $this->login_loc = $login_loc;
    }
    
    public function setMdpLoc($mdp_loc) {
        $this->mdp_loc = $mdp_loc;
    }
    
    public function setNumApart($num_apart) {
        $this->num_apart = $num_apart;
    }
    
    // Méthode pour vérifier l'existence d'un locataire en fonction du login et du mot de passe
    public function verifierLocataire($login, $mdp) {
        global $conn; // Utilise la connexion à la base de données définie dans le fichier param_connexion_BdD.php
        
        $query = "SELECT * FROM locataire WHERE login_loc = :login_loc AND mdp_loc = :mdp_loc";
        $stmt = $conn->prepare($query); // Prépare une requête SQL SELECT
        $stmt->bindParam(":login_loc", $login); // Lie les valeurs aux paramètres de la requête
        $stmt->bindParam(":mdp_loc", $mdp); // (login_loc et mdp_loc)
        $stmt->execute(); // Exécute la requête SQL

        return $stmt->fetch(PDO::FETCH_ASSOC); // Renvoie les résultats de la requête sous forme d'array associatif
    }

    public static function getLocataireById($num_loc) {
        global $conn;
    
        $query = "SELECT * FROM locataire WHERE num_loc = :num_loc";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":num_loc", $num_loc);
        $stmt->execute();
    
        $locataire = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($locataire) {
            $locataireObj = new Locataire(
                $locataire['nom_loc'],
                $locataire['prenom_loc'],
                $locataire['date_naissance'],
                $locataire['telephone_loc'],
                $locataire['numCompt_loc'],
                $locataire['banque'],
                $locataire['adresse_banque_loc'],
                $locataire['cp_banque_loc'],
                $locataire['login_loc'],
                $locataire['mdp_loc'],
                $locataire['num_apart'],
                $locataire['num_dem']
            );
            $locataireObj->setNumLoc($locataire['num_loc']);
            return $locataireObj;
        } else {
            return null; // Ajustement si aucun locataire correspondant n'est trouvé
        }
    }
    public function updateInfo() {
        global $conn;
    
        try {
            $sql = "UPDATE locataire 
                    SET nom_loc = :nom_loc, 
                        prenom_loc = :prenom_loc, 
                        date_naissance = :date_naissance, 
                        telephone_loc = :telephone_loc, 
                        numCompt_loc = :numCompt_loc, 
                        banque = :banque, 
                        adresse_banque_loc = :adresse_banque_loc, 
                        cp_banque_loc = :cp_banque_loc, 
                        login_loc = :login_loc, 
                        mdp_loc = :mdp_loc 
                    WHERE num_loc = :num_loc";
    
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom_loc', $this->getNomLoc());
            $stmt->bindParam(':prenom_loc', $this->getPrenomLoc());
            $stmt->bindParam(':date_naissance', $this->getDateNaissance());
            $stmt->bindParam(':telephone_loc', $this->getTelephoneLoc());
            $stmt->bindParam(':numCompt_loc', $this->getNumComptLoc());
            $stmt->bindParam(':banque', $this->getBanque());
            $stmt->bindParam(':adresse_banque_loc', $this->getAdresseBanqueLoc());
            $stmt->bindParam(':cp_banque_loc', $this->getCpBanqueLoc());
            $stmt->bindParam(':login_loc', $this->getLoginLoc());
            $stmt->bindParam(':mdp_loc', $this->getMdpLoc());
            $stmt->bindParam(':num_loc', $this->getNumLoc());
    
            $stmt->execute();
    
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
            return false;
        }
    }
    
    
    public function getContratLoc($num_loc) {
        global $conn;
    
        try {
            $sql = "SELECT * FROM locataire
            JOIN appartement
            ON locataire.num_apart=appartement.num_apart
            JOIN proprietaire
            ON proprietaire.num_prop=appartement.num_prop
            WHERE num_loc = :num_loc";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':num_loc', $num_loc, PDO::PARAM_INT);
            $stmt->execute();
            $infos_locataire_appartement = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $infos_locataire_appartement; // Changez la variable de retour à $infos_locataire_appartement
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des annonces : " . $e->getMessage();
            return [];
        }
    }
    
    public function getTotalAPayer($num_loc) {
        global $conn;
    
        try {
            $sql = "SELECT (prix_loc + prix_charges) AS total 
                    FROM locataire 
                    JOIN appartement ON locataire.num_apart = appartement.num_apart 
                    WHERE num_loc = :num_loc";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':num_loc', $num_loc, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $result;
        } catch (PDOException $e) {
            echo "Erreur lors du calcul du total à payer : " . $e->getMessage();
            return 0; // ou une autre valeur par défaut selon vos besoins
        }
    }


    public function supprimerLocataire($num_loc) {
        global $conn; // Utilise la connexion à la base de données définie dans le fichier param_connexion_BdD.php
    
        try {
            $query = "DELETE FROM locataire WHERE num_loc = :num_loc";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':num_loc', $num_loc);
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
}
?>
