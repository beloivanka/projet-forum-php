<?php

require_once "../services/PDOManager.php";
require_once "../models/Sujet.php";
require_once "../repositories/UtilisateurRepository.php";
require_once "../repositories/CategorieRepository.php";

class SujetRepository {

    private PDOManager $pdo;
    private CategorieRepository $categorieRepository;
    private UtilisateurRepository $utilisateurRepository;

    public function __construct()
    {
        $this->pdo = new PDOManager();
        $this->categorieRepository = new CategorieRepository();
        $this->utilisateurRepository = new UtilisateurRepository();
    }


public function createSujet(string $titreSujet, string $messageSujet, int $idUtilisateur, int $idCategorie): void{
    $date = new DateTime("now",new DateTimeZone("Europe/Paris"));
    $dateSujet = $date->format("Y-m-d H:i:s");
    $connexion = null;
    try {
        $connexion = $this->pdo->connectDB();
        $connexion->beginTransaction();
        $query = "INSERT INTO `sujet` (`titreSujet`, `messageSujet`, `idUtilisateur`, `idCategorie`, `dateSujet`) 
        VALUES (:titre, :messageSujet, :idUtilisateur, :idCategorie, :dateSujet)";
        $statement = $connexion->prepare($query);
        $statement->bindValue(":titre",$titreSujet, PDO::PARAM_STR);
        $statement->bindValue(":messageSujet",$messageSujet, PDO::PARAM_STR);
        $statement->bindValue(":idUtilisateur",$idUtilisateur, PDO::PARAM_INT);
        $statement->bindValue(":idCategorie",$idCategorie, PDO::PARAM_INT);
        $statement->bindValue(":dateSujet",$dateSujet, PDO::PARAM_STR);
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

    public function getSujets(): array | null{
        $connexion = null;
        try {
            $connexion = $this->pdo->connectDB();
            $connexion->beginTransaction();
            $query = "SELECT * FROM sujet";
            $statement = $connexion->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            if (!$results) {
                echo "les sujets n'existent pas";
                return null;
            } 
            $allSujets = [];
            foreach ($results as $result) {
                $allSujets[]= 
                $sujet = new Sujet();
                $sujet->setId($result['idSujet']);
                $sujet->setTitreSujet($result['titreSujet']);
                $sujet->setMessageSujet($result['messageSujet']);
                $sujet->setDateSujet($result['dateSujet']);
                $categorie = $this->categorieRepository->getCategorieById($result["idCategorie"]);
                $sujet->setCategorie($categorie);
                $utilisateur = $this->utilisateurRepository->getUtilisateurById($result["idUtilisateur"]);
                if(is_null($utilisateur)) {
                    $sujet->setUtilisateur(null);
                }else{
                    $sujet->setUtilisateur($utilisateur);
                }
            }
            $connexion->commit();
        }catch(PDOException $exception) {
            $connexion->rollBack();
            echo "Erreur: " . $exception->getMessage();
        }
        finally {
            $statement = null;
            $connexion = null;
        }
        return $allSujets;
    }

    public function deleteSujet(int $id): void {
        $connexion = null;
        try {
            $connexion = $this->pdo->connectDB();
            $connexion->beginTransaction();
            $query = "DELETE FROM `sujet` WHERE idSujet = :id";
            $statement = $connexion->prepare($query);
            $statement->bindValue(":id",$id, PDO::PARAM_INT);
            $statement->execute();
            $connexion->commit();
        } catch(PDOException $exception){
            $connexion->rollBack();
            echo "Erreur: " . $exception->getMessage();
        } 
    }

    public function getSujetById(int $id): Sujet | null{
        $connexion = null;
        try {
            $connexion = $this->pdo->connectDB();
            $connexion->beginTransaction();
            $query = "SELECT * FROM sujet WHERE idSujet = :id";
            $statement = $connexion->prepare($query);
            $statement->bindValue(":id",$id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                echo "le sujet n'existe pas";
                return null;
            } 
            else {
                $sujet = new Sujet();
                $sujet->setId($result['idSujet']);
                $sujet->setTitreSujet($result['titreSujet']);
                $sujet->setMessageSujet($result['messageSujet']);
                $sujet->setDateSujet($result['dateSujet']);
                $categorie = $this->categorieRepository->getCategorieById($result["idCategorie"]);
                $sujet->setCategorie($categorie);
                $utilisateur = $this->utilisateurRepository->getUtilisateurById($result["idUtilisateur"]);
                $sujet->setUtilisateur($utilisateur);
                $connexion->commit();
            }
        }catch(PDOException $exception) {
            $connexion->rollBack();
            echo "Erreur: " . $exception->getMessage();
        }
        finally {
            $statement = null;
            $connexion = null;
        }
        return $sujet;
    }
}

?>