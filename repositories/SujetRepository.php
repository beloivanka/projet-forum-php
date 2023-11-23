<?php

require_once "../services/PDOManager.php";
require_once "../models/Sujet.php";
require_once "../repositories/UtilisateurRepository.php";

class SujetRepository {

    private PDOManager $pdo;
    private Utilisateur $utilisateur;

    public function __construct()
    {
        $this->pdo = new PDOManager();
        $this->utilisateurRepository = new Utilisateur();
    }


public function createSujet (string $titreSujet, string $dateSujet, int $idCategorie, int $idUtilisateur){
    //$utilisateur = $this->utilisateurRepository->getUtilisateurByMail($mailUtilisateur);
    $connexion = null;
    try {
        $connexion = $this->pdo->connectDB();
        $connexion->beginTransaction();
        $query = "INSERT INTO `sujet` (`titreSujet`, `dateSujet`, `idCategorie`, `idUtilisateur`) VALUES (:titre, :dateSujet, :idCategorie, :idUtilisateur)";
        $statement = $connexion->prepare($query);
        $statement->bindValue(":titre",$titreSujet, PDO::PARAM_STR);
        $statement->bindValue(":dateSujet",$dateSujet, PDO::PARAM_STR);
        $statement->bindValue(":idCategorie",$idCategorie, PDO::PARAM_INT);
        $statement->bindValue(":idCategorie",$idUtilisateur, PDO::PARAM_INT);
        $statement->execute();
        $connexion->commit();
        //header('Location: login.php');
    } catch(PDOException $exception){
        $connexion->rollBack();
        echo "Erreur: " . $exception->getMessage();
        //header('Location: register.php');
    } finally {
        $statement = null;
        $connexion = null;
    }
    }
}

?>