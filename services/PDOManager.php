<?php 

class PDOManager {

    private $serveur = "localhost";
    private $user = "root";
    private $password = "root";
    private $bdd = "forum";
    public function __construct() {}
    
    public function connectDB(){

        $connexion = new PDO("mysql:host=".$this->serveur.";dbname=".$this->bdd, $this->user, $this->password);

        try{
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Vous êtes connecté à la BDD ".$this->bdd;
            return $connexion;
        }

        catch (PDOException $exception){
            echo "N: ".$exception->getCode()."<br/>";
            die ("Erreur: ".$exception->getMessage()."<br/>");
        }
    }
}

?>