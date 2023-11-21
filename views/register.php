<?php
require_once "../includes/head.php";
require_once "../controllers/UtilisateurController.php";

$utilisateurController = new UtilisateurController();

if(isset($_POST)){
  if(isset($_POST['prenom'], $_POST['nom'], $_POST['mail'], $_POST['mdp'], $_POST['confirmerMdp'], $_POST['photo']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['mail'])
  && !empty($_POST['mdp']) && !empty($_POST['confirmerMdp']) && !empty($_POST['photo'])){
    $utilisateurController->createUtilisateur($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['mdp'], $_POST['confirmerMdp'], $_POST['photo']);
    header('Location: login.php');
  }
}

?>

<head>
      <!-- <script src="../register.js" defer></script> -->
    <title>S'enregistrer</title>
</head>

  <body>

  <?php require_once "../includes/header.php"; ?>

    <section id="form-wrapper">
      <div class="form-container">
        <h2>S'enregistrer</h2>
        <form id="form" action="#" method="POST">
          <label for="firstName">Prénom</label>
          <input id="firstName" name="prenom" type="text" minlength="3" />
          <span id="firstNameError">Champ obligatoire</span>
          <span id="firstNameMinLengthError">3 lettres minimum requises sans chiffres</span>

          <label for="lastName">Nom de famille</label>
          <input id="lastName" name="nom" type="text" minlength="3" />
          <span id="lastNameError">Champ obligatoire</span>
          <span id="lastNameMinLenthError">3 lettres minimum requises sans chiffres</span>

          <label for="email">Email</label>
          <input id="email" name="mail" type="email" />
          <span id="emailError">Champ obligatoire</span>

          <label for="password">Mot de passe</label>
          <input id="password" name="mdp" type="password" />
          <span id="passwordError">Champ obligatoire</span>
          <span id="passwordErrorStyle"
            >Le mot de passe doit contenir au moins 8 caractères dont une lettre majuscule, une
            lettre minuscule, un chiffre et un caractère spécial (#+-^[])</span
          >

          <label for="confirmPassword">Confirmation mot de passe</label>
          <input id="confirmPassword" name="confirmerMdp" type="password" />
          <span id="confirmPasswordError">Champ obligatoire</span>
          <span id="confirmPasswordErrorSameText"
            >Le mot de passe ne correspond pas</span
          >
          <label for="photo">Importer votre photo</label>
          <input id="photo" name="photo" type="text" />

          <button class="btn-validate" id="validate-form-button" type="submit">VALIDER</button>
        </form>
      </div>
      <img id="img2" src="img/img2.png" alt="">
      <img id="img2-mobile" src="img/img2-mobile.png" alt="">
    </section>
  </body>
</html>