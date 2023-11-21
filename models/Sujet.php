<?php

class Sujet {
    private int $id;
    private string $titre;

    private Categorie $categorie;

    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }
    public function getTitreSujet(): string {
        return $this->titre;
    }

    public function setTitreSujet(string $titre): void {
        $this->titre = $titre;
    }

    public function getCategorie(): Categorie {
        return $this->categorie;
    }

    public function setCategorie(Categorie $categorie): void {
        $this->categorie = $categorie;
    }

}
?>