<?php
require_once '../C/param_connexion_BdD.php';
class MotsInterditsService {
    public static function estMotInterdit(...$mots) {
        global $conn; 

        try {
            foreach ($mots as $mot) {
                $sql = "SELECT COUNT(*) AS count FROM MotsInterdits WHERE mot = :mot";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':mot', $mot);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($result['count'] > 0) {
                    return true;
                }
            }
            
            return false;
        } catch (PDOException $e) {
            // Gérer l'erreur
            error_log('Erreur PDO lors de la vérification du mot interdit : ' . $e->getMessage());
            return false;
        }
    }
}


