<?php
//session_start();
require_once "../controllers/UtilisateurController.php";
$utilisateurController = new UtilisateurController();

if (isset($_POST)) {
  if (isset($_POST['deconnexionBtn'])) {
    $utilisateurController->deconnecterUtilisateur();
  }
}
?>

<header>
  <div id="header-wrapper">
    <div id="logo-container">
      <a href="../views/index.php"><img id="logo" src="../img/logo.png" alt="" /></a>
      <div>
        <p class="logo-text">Parler</p>
        <p class="logo-text">musique</p>
      </div>
    </div>
    <div id="links-container">
      <a class="logo-text logo-text-link" href="categories.php">forum</a>
      <a class="logo-text logo-text-link" href="register.php">s'enregostrer</a>
      <a class="logo-text logo-text-link" href="login.php">se connecter</a>
      <form action="#" method="POST">
        <button name="deconnexionBtn" class="logo-text logo-text-link btn-deconnect">se déconnecter</button>
      </form>
    </div>
    <div id="header-user-container">
      <a class="logo-text logo-text-link" href="../views/compteUtilisateur.php">
        <?php echo $_SESSION ? $_SESSION["prenom"] : "" ?>
      </a>
      <?php echo $_SESSION ? "<img id='user-img' src='../img/" . $_SESSION['photo'] . "' alt=''>" : "" ?>
    </div>
  </div>
</header>