<?php
require_once "../repositories/SujetRepository.php";


class SujetService {

    private SujetRepository $sujetRepository;

    public function __construct(){
        $this->sujetRepository = new SujetRepository();
    }

    public function createSujet(string $titreSujet, string $messageSujet, int $idUtilisateur, int $idCategorie): void {
        $this->sujetRepository->createSujet($titreSujet, $messageSujet, $idUtilisateur, $idCategorie);
    }

    public function getSujets(): array | null{
       return $this->sujetRepository->getSujets();
    }

    public function deleteSujet(int $id): void {
        $this->sujetRepository->deleteSujet($id);
    }

    public function getSujetById(int $id): Sujet | null {
        return $this->sujetRepository->getSujetById($id);
    }
}
?>