<?php

require_once "../services/PDOManager.php";
require_once "../models/Utilisateur.php";

class UtilisateurRepository {

    private PDOManager $pdo;
    public function __construct() {
        $this->pdo = new PDOManager();
    }

    public function createUtilisateur (string $nomUtilisateur, string $prenomUtilisateur, string $mailUtilisateur, string $mdpUtilisateur, string $photoUtilisateur): void{
        $connexion = null;
        try {
            $connexion = $this->pdo->connectDB();
            $connexion->beginTransaction();
            $query = "INSERT INTO `utilisateur` (`nomUtilisateur`, `prenomUtilisateur`, `mailUtilisateur`, `mdpUtilisateur`, `photoUtilisateur`) VALUES (:nom, :prenom, :mail, :mdp, :photo)";
            $statement = $connexion->prepare($query);
            $statement->bindValue(":nom",$nomUtilisateur, PDO::PARAM_STR);
            $statement->bindValue(":prenom",$prenomUtilisateur, PDO::PARAM_STR);
            $statement->bindValue(":mail",$mailUtilisateur, PDO::PARAM_STR);
            $statement->bindValue(":mdp",$mdpUtilisateur, PDO::PARAM_STR);
            $statement->bindValue(":photo",$photoUtilisateur, PDO::PARAM_STR);
            $statement->execute();
            $connexion->commit();
        } catch(PDOException $exception){
            $connexion->rollBack();
            echo "Erreur: " . $exception->getMessage();
        } finally {
            /**
             * fermer la connexion (a verifier)
             */
            $statement = null;
            $connexion = null;
        }
    }

    public function connectUtilisateur(string $mailUtilisateur, string $mdp){
        $connexion = null;
        try {
            $connexion = $this->pdo->connectDB();
            $connexion->beginTransaction();
            $query = "SELECT * FROM `utilisateur` WHERE mailUtilisateur = :mail";
            $statement = $connexion->prepare($query);
            $statement->bindValue(":mail",$mailUtilisateur, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if($result && password_verify($mdp, $result["mdpUtilisateur"])){
                $utilisateur = new Utilisateur();
                $utilisateur->setId($result["idUtilisateur"]);
                $utilisateur->setNomUtilisateur($result["nomUtilisateur"]);
                header('Location: ../views/categories.php');
            } else {
                echo "L'utilisateur n'existe pas";
                header('Location: ../views/forumApprendre.php');
            }
            $connexion->commit();
        } catch(PDOException $exception){
            $connexion->rollBack();
            echo "Erreur: " . $exception->getMessage();
        } 
        finally {
            $statement = null;
            $connexion = null;
        }
    }
}

?>