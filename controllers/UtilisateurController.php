<?php
require_once "../services/UtilisateurService.php";
class UtilisateurController {

    private UtilisateurService $utilisateurService;
    public function __construct() {
        $this->utilisateurService = new UtilisateurService();
    }

    public function createUtilisateur (string $nomUtilisateur, string $prenomUtilisateur, string $mailUtilisateur, string $mdpUtilisateur, string $confirmationMotdePasse, string $photoUtilisateur): void {
        $this->utilisateurService->createUtilisateur($nomUtilisateur, $prenomUtilisateur, $mailUtilisateur, $mdpUtilisateur, $confirmationMotdePasse, $photoUtilisateur);
    }

    public function connectUtilisateur (string $mailUtilisateur, string $mdpUtilisateur): void{
        $this->utilisateurService->connectUtilisateur($mailUtilisateur, $mdpUtilisateur);
    }

    public function getUtilisateurByMail(string $mailUtilisateur): Utilisateur | null {
        return $this->utilisateurService->getUtilisateurByMail($mailUtilisateur);
    }

    public function getUtilisateurById(string $idUtilisateur): void{
        $this->utilisateurService->getUtilisateurById($idUtilisateur);
    }

    public function deconnecterUtilisateur(){
        $this->utilisateurService->deconnecterUtilisateur();
    }

    public function deleteAccount(string $idUtilisateur): void {
        $this->utilisateurService->deleteAccount($idUtilisateur);
    }
}
?>