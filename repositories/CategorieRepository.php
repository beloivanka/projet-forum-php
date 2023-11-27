<?php

require_once "../services/PDOManager.php";
require_once "../models/Categorie.php";

class CategorieRepository {
    private PDOManager $pdo;

    public function __construct()
    {
        $this->pdo = new PDOManager();
    }

    public function getCategorieById(int $id) : Categorie | null{
        $connexion = null;
        try {
            $connexion = $this->pdo->connectDB();
            $connexion->beginTransaction();
            $query = "SELECT * FROM categorie WHERE idCategorie = :id";
            $statement = $connexion->prepare($query);
            $statement->bindValue(":id",$id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                echo "la categorie n'existe pas";
                return null;
            } 
            else {
                $categorie = new Categorie();
                $categorie->setId($result['idCategorie']);
                $categorie->setTitreCategorie($result['titreCategorie']);
                $categorie->setDescription($result['description']);
                $categorie->setImage($result['imageCategorie']);
                $categorie->setUrl($result['urlNom']);
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
        return $categorie;
    }

    public function getCategorieByTitre(string $titre) : Categorie | null{
        $connexion = null;
        try {
            $connexion = $this->pdo->connectDB();
            $connexion->beginTransaction();
            $query = "SELECT * FROM categorie WHERE titreCategorie = :titre";
            $statement = $connexion->prepare($query);
            $statement->bindValue(":titre",$titre, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                echo "la categorie n'existe pas";
                return null;
            } 
            else {
                $categorie = new Categorie();
                $categorie->setId($result['idCategorie']);
                $categorie->setTitreCategorie($result['titreCategorie']);
                $categorie->setDescription($result['description']);
                $categorie->setImage($result['imageCategorie']);
                $categorie->setUrl($result['urlNom']);
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
        return $categorie;
    }

    public function getCategorieByUrl(string $url) : Categorie | null{
        $connexion = null;
        try {
            $connexion = $this->pdo->connectDB();
            $connexion->beginTransaction();
            $query = "SELECT * FROM categorie WHERE urlNom = :urlNom";
            $statement = $connexion->prepare($query);
            $statement->bindValue(":urlNom",$url, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                echo "la categorie n'existe pas";
                return null;
            } 
            else {
                $categorie = new Categorie();
                $categorie->setId($result['idCategorie']);
                $categorie->setTitreCategorie($result['titreCategorie']);
                $categorie->setDescription($result['description']);
                $categorie->setImage($result['imageCategorie']);
                $categorie->setUrl($result['urlNom']);
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
        return $categorie;
    }

    public function getCategories() : array | null {
        $connexion = null;
        try {
            $connexion = $this->pdo->connectDB();
            $connexion->beginTransaction();
            $query = "SELECT * FROM categorie";
            $statement = $connexion->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            if (!$results) {
                echo "les categories n'existent pas";
                return null;
            } 
            $allCategories = [];
            foreach ($results as $result) {
                $allCategories[]= 
                $categorie = new Categorie();
                $categorie->setId($result['idCategorie']);
                $categorie->setTitreCategorie($result['titreCategorie']);
                $categorie->setDescription($result['description']);
                $categorie->setImage($result['imageCategorie']);
                $categorie->setUrl($result['urlNom']);
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
        return $allCategories;
    }
}



?>