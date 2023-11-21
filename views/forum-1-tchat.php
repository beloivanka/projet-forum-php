<?php
require_once "../includes/head.php"
?>

<head>
<title>Forum</title>
</head>

<body>
<?php require_once "../includes/header.php"; ?>

<div>
      <section class="img5-wrapper1" id="img5">
        <div>
          <h4>Apprendre à jouer</h4>
        </div>
      </section>

      <div id="background">
        <section id="table-container" class="table-container">
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Sujet</th>
                <th>Date de création</th>
                <th>Auteur</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="div-parent"></tbody>
          </table>
        </section>

        <section id="new-message" class="new-message">
          <table>
            <thead>
              <tr>
                <th>Message</th>
                <th>Envoyé(e) par</th>
              </tr>
            </thead>
            <tbody id="div-parent2"></tbody>
          </table>
        </section>

        <section id="message-field">
          <h5>Votre message:</h5>
          <p class="none" id="errorMessage">Champs obligatoire</p>
          <textarea
            class="ajout-input"
            name="message"
            id="message"
            cols="30"
            rows="8"
            placeholder="Ecrivez votre message..."
          ></textarea>
          <div id="btn-ajout-container">
            <button id="btnMessage" class="btn ajout-btn">Envoyer</button>
          </div>
        </section>
      </div>
    </div>

</body>