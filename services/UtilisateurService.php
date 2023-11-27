<?php
require_once "../repositories/UtilisateurRepository.php";


class UtilisateurService {

    private UtilisateurRepository $utilisateurRepository;

    public function __construct(){
        $this->utilisateurRepository = new UtilisateurRepository();
    }

    public function createUtilisateur (string $nomUtilisateur, string $prenomUtilisateur, string $mailUtilisateur, string $mdpUtilisateur, string $confirmationMotdePasse, string $photoUtilisateur): void {

        $nomNettoye = $this->nettoyerDonnees($nomUtilisateur);
        $prenomNettoye = $this->nettoyerDonnees($prenomUtilisateur);
        $emailCorrect = $this->verifierMail($mailUtilisateur);
        $motDePasseCorrect = $this->verifierMotDePasse($mdpUtilisateur);
        $confirmMotDePasseCorrect = $this->verifierMotDePasse($confirmationMotdePasse);

        if($emailCorrect && $motDePasseCorrect && $confirmMotDePasseCorrect && $motDePasseCorrect == $confirmMotDePasseCorrect){
                //on crypte le mot de passe
            $motDePasseEncrypte = password_hash($mdpUtilisateur, PASSWORD_BCRYPT);
                //on fait la requête
            $this->utilisateurRepository->createUtilisateur($nomNettoye, $prenomNettoye, $mailUtilisateur, $motDePasseEncrypte, $photoUtilisateur);
            //header('Location: login.php');
        }else {
            echo "Données incorrectes";
            //header('Location: register.php');
        }
    }

    private function verifierMail(string $mail): bool{
        return preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#" , $mail);
    }

    private function verifierMotDePasse(string $motDePasse): bool{
        return preg_match("#^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,})$#", $motDePasse);
    }

    private function nettoyerDonnees($donnees): string{
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
    }

    public function connectUtilisateur(string $mailUtilisateur, string $mdp): void{
        $mailNettoye = $this->nettoyerDonnees($mailUtilisateur);
        $this->utilisateurRepository->connectUtilisateur($mailNettoye, $mdp);
    }

    public function getUtilisateurByMail(string $mailUtilisateur): Utilisateur | null{
       return $this->utilisateurRepository->getUtilisateurByMail($mailUtilisateur);
    }

    public function getUtilisateurById(string $idUtilisateur): void{
        $this->utilisateurRepository->getUtilisateurById($idUtilisateur);
    }

    public function deconnecterUtilisateur(){
        $this->utilisateurRepository->deconnecterUtilisateur();
    }

}

?>