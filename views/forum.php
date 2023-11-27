<?php
require_once "../includes/head.php";
require_once "../controllers/CategorieController.php";
require_once "../controllers/SujetController.php";
require_once "../controllers/UtilisateurController.php";
session_start();

if ($_SESSION == false) {
    header('Location: index.php');
}

$categorieController = new CategorieController();
$categorie = $categorieController->getCategorieByUrl($_GET['nom']); 

$sujetController = new SujetController();
$sujets = $sujetController->getSujets();

$utilisateurController = new UtilisateurController();
$utilisateur = $utilisateurController->getUtilisateurByMail($_SESSION['mail']);

if(isset($_POST)){
    if (isset($_POST['sujet'], $_POST['messageSujet']) && !empty($_POST['sujet']) && !empty($_POST['messageSujet'])) {
        $sujetController->createSujet($_POST['sujet'], $_POST['messageSujet'], $_SESSION['id'], $categorie->getId());
        echo "<meta http-equiv='refresh' content='0'>";
    }
    if (isset($_POST['deleteSujet'])) {
        $id = $_POST['idSujet'];
        $sujetController->deleteSujet($id);
        echo "<meta http-equiv='refresh' content='0'>";
    }
}


/**
 * ici on recupere UNE categorie par son nom d'url avec la fonction getCategorieByUrl et on lui passe
 * un string (c'est son url)
 * on recupere ca grace a $_GET['nom] (voir la page categorie.php au niveau du lien <a>, on a mis la valeur de l'url de la categorie)
 * maintenant, il faut faire en sorte que quand on envoie le sujet il se cree
 * on aura besoin de:
 * la categorie
 * les variables post du formulaire: titre du sujet, message
 * la date sera faite dans le repository, pas besoin de site
 * l'id de l'utilisateur qui est dans la session $_SESSION["id"]
 * on passe tout ca dans une fonction d'un sujetController jusqu'au sujet Repository et on fait la requete
 */
?>

<head>
    <script src="../forum.js" defer></script>
    <script src="../forum2.js" defer></script>
    <title>Forum</title>
</head>

<body>
    <?php require_once "../includes/header.php"; ?>

    <!-- Forum par categorie -->

    <div>
        <section class="img5-wrapper1" id="img5">
            <div>
                <!-- <h4>Apprendre à jouer</h4> -->
                <h4>
                    <?php echo $categorie->getTitreCategorie(); ?>
                </h4>
            </div>
        </section>

        <div id="background">
                <?php 
                if($sujets){
                    foreach ($sujets as $sujet){
                        echo 
                        "<section class='topic-container'>
                        <div class='user-topic-container'>
                            <img id='user-img-topic' src='../img/".$sujet->getUtilisateur()->getPhotoUtilisateur()."' alt=''>
                            <p>".$sujet->getUtilisateur()->getPrenomUtilisateur()."</p>
                        </div>
                        <div class='topic-content-container'>
                            <a class='link-topic-style' href='tchat.php?id=".$sujet->getId()."' >".$sujet->getTitreSujet()."</a>
                            <p class='date-text'>Sujet publié le ".$sujet->getDateSujet()."</p>
                            <p class='message'>".$sujet->getMessageSujet()."</p>";
                            if($_SESSION['id'] === $sujet->getUtilisateur()->getId()){
                               echo "<form method='POST' action=#>
                                   <input type='hidden' name='idSujet' value='".$sujet->getId()."'/>
                                   <button type='submit' name='deleteSujet'>Supprimer</button>
                               </form>";
                            }
                       echo "</div>
                        </section>";
                       } 
                }
                ?>

            <form action="#" method="POST" class="new-topic-container">
                <h5>Titre du sujet</h5>
                <p class="none" id="errorMessageAjout">Champs obligatoire</p>
                <input id="sujetInput" name="sujet" class="message-field" type="text" placeholder="Créez une nouvelle discussion" />
                <h5>Votre message:</h5>
                <p class="none" id="errorMessage">Champs obligatoire</p>
                <textarea name="messageSujet" class="message-field" cols="30" rows="8"
                    placeholder="Ecrivez votre message..."></textarea>
                <div id="btn-ajout-container"> 
                    <button type="submit" name="submit" id="btnAjouter" class="btn ajout-btn">Ajouter</button>
                </div>
            </form>

        </div>
    </div>

</body>