<?php
require_once "../includes/head.php"
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
            Bienvenue <span class="connect-text" id="name"></span>
          </p>
          <p class="connect-text">
            Nous sommes le <span class="connect-text" id="day"></span
            ><span class="connect-text" id="month"></span
            ><span class="connect-text" id="year"></span>
          </p>
          <p class="connect-text">
            Vous vous êtes connecté à
            <span class="connect-text" id="heures"></span
            ><span class="connect-text" id="minutes"></span>
          </p>
        </div>
        <h1 class="forum-title">Découvrez notre forum</h1>
      </div>
      <div id="cards-container">
        <div class="card-container">
          <img class="img-card" src="img/img-card1.png" alt="" />
          <h3>Apprendre à jouer</h3>
          <div class="line"></div>
          <p class="text-card">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
          <div class="voir-btn-container">
            <a id="btn1" class="voir-btn" href="forum-1.php">
              Voir plus
            </a>
          </div>
        </div>
        <div class="card-container">
          <img class="img-card" src="img/img-card2.png" alt="" />
          <h3>Partager les partitions</h3>
          <div class="line"></div>
          <p class="text-card">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
          <div class="voir-btn-container">
            <button id="btn2" class="voir-btn" href="forum2.php">
              Voir plus
            </button>
          </div>
        </div>
        <div class="card-container">
          <img class="img-card" src="img/img-card3.png" alt="" />
          <h3>Echanger</h3>
          <div class="line"></div>
          <p class="text-card">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
          <div class="voir-btn-container">
            <button id="btn3" class="voir-btn" href="forum2.php">
              Voir plus
            </button>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
