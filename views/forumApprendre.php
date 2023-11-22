<?php
require_once "../includes/head.php"
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

        <section id="ajout-container" class="ajout-container">
          <h5>Titre du sujet</h5>
          <p class="none" id="errorMessageAjout">Champs obligatoire</p>
          <input
            id="sujetInput"
            class="ajout-input"
            type="text"
            placeholder="Créez une nouvelle discussion"
          />
          <div id="btn-ajout-container">
            <button id="btnAjouter" class="btn ajout-btn">Ajouter</button>
          </div>
        </section>

      </div>
    </div>

</body>