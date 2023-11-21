<?php

class Categorie {
    private int $id;
    private string $titre;

    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }
    public function getTitreCategorie(): string {
        return $this->titre;
    }

    public function setTitreCategorie(string $titre): void {
        $this->titre = $titre;
    }

}
?>