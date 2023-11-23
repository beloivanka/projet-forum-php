<?php
require_once "../includes/head.php";
session_start();

if ($_SESSION == false){
  header('Location: index.php');
}
?>

<head>
<script src="../forum.js" defer></script>
<script src="../forum2.js" defer></script>
<title>Forum</title>
</head>

<body>
<?php require_once "../includes/header.php"; ?>

    <!-- Forum -->

    <div>
      <section class="img5-wrapper1" id="img5">
        <div>
          <h4>Apprendre à jouer</h4>
        </div>
      </section>

      <div id="background">
        <section class="topic-container">
          <div class="user-topic-container">
            <img id="user-img-topic" src="../img/user-photo.png" alt="">
            <p>Nadine</p>
          </div>
          <div class="topic-content-container">
            <h5>Titre du sujet</h5>
            <p class="date-text">Publié le 22/11/2023 à 15h00</p>
            <p class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </section>

        <section class="new-topic-container">
          <h5>Titre du sujet</h5>
          <p class="none" id="errorMessageAjout">Champs obligatoire</p>
          <input
            id="sujetInput"
            class="message-field"
            type="text"
            placeholder="Créez une nouvelle discussion"
          />
          <h5>Votre message:</h5>
          <p class="none" id="errorMessage">Champs obligatoire</p>
          <textarea
            name="message"
            class="message-field"
            cols="30"
            rows="8"
            placeholder="Ecrivez votre message..."
          ></textarea>
          <div id="btn-ajout-container">
            <button id="btnAjouter" class="btn ajout-btn">Ajouter</button>
          </div>
        </section>

      </div>
    </div>

</body>