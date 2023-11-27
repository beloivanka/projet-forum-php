<?php

require_once "../services/PDOManager.php";
require_once "../models/Message.php";
require_once "../repositories/UtilisateurRepository.php";
require_once "../repositories/SujetRepository.php";


class MessageRepository {
    private PDOManager $pdo;
    private SujetRepository $sujetRepository;
    private UtilisateurRepository $utilisateurRepository;
    public function __construct()
    {
        $this->pdo = new PDOManager();
        $this->sujetRepository = new SujetRepository();
        $this->utilisateurRepository = new UtilisateurRepository();
    }

    public function createMessage(string $message, int $idUtilisateur, int $idSujet): void{
        $date = new DateTime("now",new DateTimeZone("Europe/Paris"));
        $dateMessage = $date->format("Y-m-d H:i:s");
        $connexion = null;
        try {
            $connexion = $this->pdo->connectDB();
            $connexion->beginTransaction();
            $query = "INSERT INTO `message` (`message`, `dateMessage`, `idUtilisateur`, `idSujet`) 
            VALUES (:mess, :dat, :idUtilisateur, :idSujet)";
            $statement = $connexion->prepare($query);
            $statement->bindValue(":mess",$message, PDO::PARAM_STR);
            $statement->bindValue(":dat",$dateMessage, PDO::PARAM_STR);
            $statement->bindValue(":idUtilisateur",$idUtilisateur, PDO::PARAM_INT);
            $statement->bindValue(":idSujet",$idSujet, PDO::PARAM_INT);
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

    public function getMessages(int $id): array | null{
        $connexion = null;
        try {
            $connexion = $this->pdo->connectDB();
            $connexion->beginTransaction();
            $query = "SELECT * FROM `message` WHERE idSujet = :id";
            $statement = $connexion->prepare($query);
            $statement->bindValue(":id",$id, PDO::PARAM_INT);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            if (!$results) {
                echo "les messages n'existent pas";
                return null;
            } 
            $allMessages = [];
            foreach ($results as $result) {
                $allMessages[]= 
                $message = new Message();
                $message->setId($result['idMessage']);
                $message->setMessage($result['message']);
                $message->setDateMessage($result['dateMessage']);
                $sujet = $this->sujetRepository->getSujetById($result["idSujet"]);
                $message->setSujet($sujet);
                $utilisateur = $this->utilisateurRepository->getUtilisateurById($result["idUtilisateur"]);
                $message->setUtilisateur($utilisateur);
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
        return $allMessages;
    }

    public function deleteMessage(int $id): void {
        $connexion = null;
        try {
            $connexion = $this->pdo->connectDB();
            $connexion->beginTransaction();
            $query = "DELETE FROM `message` WHERE idMessage = :id";
            $statement = $connexion->prepare($query);
            $statement->bindValue(":id",$id, PDO::PARAM_INT);
            $statement->execute();
            $connexion->commit();
        } catch(PDOException $exception){
            $connexion->rollBack();
            echo "Erreur: " . $exception->getMessage();
        } 
    }   
}

?>