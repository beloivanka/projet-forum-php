<?php
require_once "../services/CategorieService.php";
class CategorieController {

    private CategorieService $categorieService;
    public function __construct() {
        $this->categorieService = new CategorieService();
    }

    public function getCategories():  array | null{
        return $this->categorieService->getCategories();
    }

    public function getCategorieById(int $id): Categorie | null{
        return $this->categorieService->getCategorieById($id);
    }

    public function getCategorieByTitre(string $titre): Categorie | null{
        return $this->categorieService->getCategorieByTitre($titre);
    }

    public function getCategorieByUrl(string $url): Categorie | null{
        return $this->categorieService->getCategorieByUrl($url);
     }

    
}
?>