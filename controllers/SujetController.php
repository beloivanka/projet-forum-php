<?php
require_once "../services/SujetService.php";
class SujetController {

    private SujetService $sujetService;
    public function __construct() {
        $this->sujetService = new SujetService();
    }

    public function createSujet(string $titreSujet, string $messageSujet, int $idUtilisateur, int $idCategorie): void {
        $this->sujetService->createSujet($titreSujet, $messageSujet, $idUtilisateur, $idCategorie);
    }

    public function getSujets(): array | null{
        return $this->sujetService->getSujets();
    }

    public function deleteSujet(int $id): void {
        $this->sujetService->deleteSujet($id);
    }
    public function getSujetById(int $id): Sujet | null {
        return $this->sujetService->getSujetById($id);
    }
}
?>