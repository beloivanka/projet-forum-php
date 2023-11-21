<?php

class Message {
    private int $id;
    private string $message;
    private Utilisateur $utilisateur;
    private Sujet $sujet;

    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }
    public function getMessage(): string {
        return $this->message;
    }

    public function setMessage(string $message): void {
        $this->message = $message;
    }

    public function getUtilisateur(): Utilisateur {
        return $this->utilisateur;
    }

    public function setUtilisateur(Utilisateur $utilisateur): void {
        $this->utilisateur = $utilisateur;
    }

    public function getSujet(): Sujet {
        return $this->sujet;
    }

    public function setSujet(Sujet $sujet): void {
        $this->sujet = $sujet;
    }

}
?>