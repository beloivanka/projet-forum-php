<?php

class Utilisateur {
    private int $id;
    
    private string $nom;
    private string $prenom;
    private string $mail; 
    private string $mdp; 
    private string $photo; 

    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }
    public function getNomUtilisateur(): string {
        return $this->nom;
    }
    public function setNomUtilisateur(string $nom): void {
        $this->nom = $nom;
    }

    public function getPrenomUtilisateur(): string {
        return $this->prenom;
    }
    public function setPrenomUtilisateur(string $prenom): void {
        $this->prenom;
    }

    public function getMailUtilisateur(): string {
        return $this->mail;
    }
    public function setMailUtilisateur(string $mail): void {
        $this->mail;
    }

    public function getMdpUtilisateur(): string {
        return $this->mdp;
    }
    public function setMdpUtilisateur(string $mdp): void {
        $this->mdp;
    }

    public function getPhotoUtilisateur(): string {
        return $this->photo;
    }
    public function setPhotoUtilisateur(string $photo): void {
        $this->photo;
    }
}
?>