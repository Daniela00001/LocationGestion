<?php
require_once '../C/param_connexion_BdD.php';

class Admin {
    protected $id;
    protected $login;
    protected $mdp;
    protected $mail;

    // Constructeur de la classe
    public function __construct($id = '', $login = '', $mdp = '', $mail = '') {
        // Initialise les propriétés de la classe avec les valeurs fournies
        $this->id = $id;
        $this->login = $login;
        $this->mdp = $mdp;
        $this->mail = $mail;
    }

    // Méthode pour se connecter en tant qu'administrateur
    public static function login($login, $mdp) {
        global $conn; 

        try {
           
          
            $sql = "SELECT * FROM admin WHERE login = :login AND mdp = :mdp";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':mdp', $mdp);
            
            $stmt->execute(); // Exécute la requête SQL

        return $stmt->fetch(PDO::FETCH_ASSOC);
            
        } catch(PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
            return false;
        }

    }
}
?>
