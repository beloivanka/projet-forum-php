<?php

class Sujet {
    private int $id;
    private string $titre;
    private string $messageSujet;

    private string $dateSujet;

    private Categorie $categorie;

    private ?Utilisateur $utilisateur;

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

    public function getMessageSujet(): string {
        return $this->messageSujet;
    }

    public function setMessageSujet(string $messageSujet): void {
        $this->messageSujet = $messageSujet;
    }

    public function getDateSujet(): string {
        return $this->dateSujet;
    }

    public function setDateSujet(string $dateSujet): void {
        $this->dateSujet = $dateSujet;
    }

    public function getCategorie(): Categorie {
        return $this->categorie;
    }

    public function setCategorie(Categorie $categorie): void {
        $this->categorie = $categorie;
    }

    public function getUtilisateur(): ?Utilisateur {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): void {
        $this->utilisateur = $utilisateur;
    }

}
?>