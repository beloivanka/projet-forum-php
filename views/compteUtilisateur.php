<?php
require_once "../includes/head.php";
session_start();

if ($_SESSION == false){
    header('Location: index.php');
  }
?>

<head>
    <title>Votre compte</title>
</head>

<body>
    <?php require_once "../includes/header.php"; ?>

    <section id="compte-wrapper">
        <h2>Mon compte</h2>
        <div id="compte-container">
            <?php
            if ($_SESSION) {
                echo "<img id='compte-img' src='../img/" . $_SESSION['photo'] . "' alt=''>";
            } else {
                echo "";
            } ?>
            <p>
                <?php
                if ($_SESSION) {
                    echo $_SESSION['prenom'];
                } else {
                    echo "";
                } ?>
            </p>
            <p>
                <?php
                if ($_SESSION) {
                    echo $_SESSION['nom'];
                } else {
                    echo "";
                } ?>
            </p>
            <p>
                <?php
                if ($_SESSION) {
                    echo $_SESSION['mail'];
                } else {
                    echo "";
                } ?>
            </p>
        </div>
    </section>
</body>