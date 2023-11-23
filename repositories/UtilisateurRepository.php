<?php

require_once "../services/PDOManager.php";
require_once "../models/Utilisateur.php";

class UtilisateurRepository
{

    private PDOManager $pdo;
    public function __construct()
    {
        $this->pdo = new PDOManager();
    }

    public function createUtilisateur (string $nomUtilisateur, string $prenomUtilisateur, string $mailUtilisateur, string $mdpUtilisateur, string $photoUtilisateur){
        $utilisateur = $this->getUtilisateurByMail($mailUtilisateur);
        if (is_null($utilisateur)) {
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
                header('Location: login.php');
            } catch(PDOException $exception){
                $connexion->rollBack();
                echo "Erreur: " . $exception->getMessage();
                header('Location: register.php');
            } finally {
                /**
                 * fermer la connexion (a verifier)
                 */
                $statement = null;
                $connexion = null;
            }
        } 
    }



    public function getUtilisateurByMail(string $mailUtilisateur): Utilisateur | null{
        $connexion = null;
        $utilisateur = null;
        try {
            $connexion = $this->pdo->connectDB();
            $connexion->beginTransaction();
            $query = "SELECT * FROM `utilisateur` WHERE mailUtilisateur = :mail";
            $statement = $connexion->prepare($query);
            $statement->bindValue(":mail", $mailUtilisateur, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                echo "C'est bon, cet utilisateur n'existe pas, on va le creer";
                return null;
                // header('Location: categories.php');
            } else {
                $utilisateur = new Utilisateur();
                $utilisateur->setId($result['idUtilisateur']);
                $utilisateur->setPrenomUtilisateur($result['prenomUtilisateur']);
                $utilisateur->setNomUtilisateur($result['nomUtilisateur']);
                $utilisateur->setMailUtilisateur($result['mailUtilisateur']);
                $utilisateur->setMdpUtilisateur($result['mdpUtilisateur']);
                $utilisateur->setPhotoUtilisateur($result['photoUtilisateur']);
                $connexion->commit();
            }
            
        } catch (PDOException $exception) {
            $connexion->rollBack();
            echo "Erreur: " . $exception->getMessage();
        } finally {
            $statement = null;
            $connexion = null;
        }
        return $utilisateur;
    }


    public function connectUtilisateur(string $mailUtilisateur, string $mdp)
    {
        $connexion = null;
        try {
            $connexion = $this->pdo->connectDB();
            $connexion->beginTransaction();
            $query = "SELECT * FROM `utilisateur` WHERE mailUtilisateur = :mail";
            $statement = $connexion->prepare($query);
            $statement->bindValue(":mail", $mailUtilisateur, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            //$mdpUpdate = $_POST['mdpLogin'];
            if ($result && password_verify($mdp, $result['mdpUtilisateur'])) {
                $utilisateur = new Utilisateur();
                $utilisateur->setId($result['idUtilisateur']);
                $utilisateur->setPrenomUtilisateur($result['prenomUtilisateur']);
                $utilisateur->setNomUtilisateur($result['nomUtilisateur']);
                $utilisateur->setMailUtilisateur($result['mailUtilisateur']);
                $utilisateur->setMdpUtilisateur($result['mdpUtilisateur']);
                $utilisateur->setPhotoUtilisateur($result['photoUtilisateur']);
                
                // On ajoute la session
                $this->creerSession($utilisateur);

                header('Location: ../views/categories.php');
            } else {
                echo "E-mail ou mot de passe incorrect";
                // header('Location: ../views/forumApprendre.php');
            }
            $connexion->commit();
        } catch (PDOException $exception) {
            $connexion->rollBack();
            echo "Erreur: " . $exception->getMessage();
        } finally {
            $statement = null;
            $connexion = null;
        }
    }

    public function creerSession(Utilisateur $utilisateur){
        $heure = new DateTime("now",new DateTimeZone("Europe/Paris"));
        $_SESSION["id"] = $utilisateur->getId();
        $_SESSION["prenom"] = $utilisateur->getPrenomUtilisateur();
        $_SESSION["nom"] = $utilisateur->getNomUtilisateur();
        $_SESSION["mail"] = $utilisateur->getMailUtilisateur();
        $_SESSION["photo"] = $utilisateur->getPhotoUtilisateur();
        $_SESSION["dateConnexion"] = date("d.m.y");
        $_SESSION["heureConnexion"] = $heure->format("H:i");

        //$_SESSION["sujet"] = "";
        //$_SESSION["message"] = "";
    }

    public function deconnecterUtilisateur(){
       session_unset();
       session_destroy();
       header('Location: ../views/index.php');
    }
}

?>