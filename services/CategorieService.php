<?php
require_once "../repositories/CategorieRepository.php";


class CategorieService {

    private CategorieRepository $categorieRepository;

    public function __construct(){
        $this->categorieRepository = new CategorieRepository();
    }

    public function getCategories(): array | null{
       return $this->categorieRepository->getCategories();
    }

    public function getCategorieById(int $id): Categorie | null{
       return $this->categorieRepository->getCategorieById($id);
    }

    public function getCategorieByTitre(string $titre): Categorie | null{
        return $this->categorieRepository->getCategorieByTitre($titre);
     }

     public function getCategorieByUrl(string $url): Categorie | null{
        return $this->categorieRepository->getCategorieByUrl($url);
     }
}

?>