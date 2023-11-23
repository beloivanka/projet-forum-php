<?php
require_once "../includes/head.php";
require_once "../controllers/UtilisateurController.php";
session_start();

$utilisateurController = new UtilisateurController();



if(isset($_POST)){
  if(isset($_POST['mailLogin'], $_POST['mdpLogin']) && !empty($_POST['mailLogin']) && !empty($_POST['mdpLogin'])){
    $utilisateurController->connectUtilisateur($_POST['mailLogin'], $_POST['mdpLogin']);
  }
}

?>

<head>    
  <title>Se connecter</title>
</head>

<body>

<?php require_once "../includes/header.php"; ?>

      <div id="login-wrapper">
        <img id="img3" src="../img/img3.png" alt="">
        <img id="img3-mobile" src="../img/img3-mobile.png" alt="">
        <div class="login-container">
          <h2>Se connecter</h2>
          <form id="form" action="#" method="POST">
              <label for="mail">Identifiant:</label>
              <input
                class="input-style"
                type="text"
                name="mailLogin"
                id="email"
                placeholder="Votre E-mail"
              />
              <p id="emailError">Incorrect</p>
              <label for="password">Mot de passe:</label>
              <input
                class="input-style"
                type="password"
                minlength="8"
                name="mdpLogin"
                id="password"
                placeholder="Votre mot de passe"
              />
              <p id="passwordError">Incorrect</p>
            <button class="btn-validate" id="confirm-form-button" type="submit">SE CONNECTER</button>
          </form>
        </div>
      </div>
    
</body>
</html>