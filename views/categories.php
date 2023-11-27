<?php
require_once "../includes/head.php";
require_once "../controllers/CategorieController.php";
session_start();

if ($_SESSION == false) {
  header('Location: index.php');
}

$categorieController = new CategorieController();
$categories = $categorieController->getCategories();
/**
 * on recupere le tableau avec toutes les categories, en bas on fait un foreach pour
 * boucler sur le tableau de categories et pour chacune on cree les div comme tu as fait
 * pour le lien, ca utilise un query parameterm => le nom=apprendreajouer dans l'url
 * chaque lien renvoie vers une page forum.php?nom=nomDeLaCategorie
 * une categorie contient un id, un titre, un urlNom (pour la redirection dans l'url)
 * une image, une description
 * ==> suite dans la page forum.php
 */
?>

<head>
  <title>Forum</title>
</head>

<body>

  <?php require_once "../includes/header.php"; ?>

  <section id="forum-wrapper">
    <div id="mobile-container">
      <div id="connect-text-container">
        <p class="connect-text">
          Bienvenue <span class="connect-text" id="name">
            <?php echo $_SESSION["prenom"] ?>
          </span>
        </p>
        <p class="connect-text">
          Nous sommes le <span class="connect-text" id="day">
            <?php echo $_SESSION["dateConnexion"] ?>
          </span>
        </p>
        <p class="connect-text">
          Vous vous êtes connecté à
          <span class="connect-text" id="heures">
            <?php echo $_SESSION["heureConnexion"] ?>
          </span>
        </p>
      </div>
      <h1 class="forum-title">Découvrez notre forum</h1>
    </div>
    <div id="cards-container">
      <?php foreach ($categories as $categorie) {
      echo
      "<div class='card-container'>
          <img class='img-card' src='../img/" . $categorie->getImage() . "' alt='categorie" . $categorie->getTitreCategorie() . "'/>
          <h3>" . $categorie->getTitreCategorie() . "</h3>
          <div class='line'></div>
          <p class='text-card'>" . $categorie->getDescription() . "</p>
          <div class='voir-btn-container'>
            <a id='btn1' class='voir-btn' href='forum.php?nom=" . $categorie->getUrl() . "'> Voir plus</a>
          </div>
      </div>";
      }
      ?>
    </div>
  </section>
</body>

</html>