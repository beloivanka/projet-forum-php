<?php
require_once "../includes/head.php";
require_once "../controllers/UtilisateurController.php";
session_start();

if ($_SESSION == false) {
    header('Location: index.php');
}

$utilisateurController = new UtilisateurController();

if (isset($_POST['deleteAccount'])) {
    $utilisateurController->deleteAccount($_SESSION['id']);
    $utilisateurController->deconnecterUtilisateur();
    header('index.php');
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
            <?php echo $_SESSION ? "<img id='compte-img' src='../img/" . $_SESSION['photo'] . "'>" : "" ?>
            <p>
                <?php echo $_SESSION ? $_SESSION["prenom"] : "" ?>
            </p>
            <p>
                <?php echo $_SESSION ? $_SESSION["nom"] : "" ?>
            </p>
            <p>
                <?php echo $_SESSION ? $_SESSION["mail"] : "" ?>
            </p>
            <form method='POST' action=#>
                <button type='submit' name='deleteAccount'>Supprimer le compte</button>
            </form>
        </div>
    </section>
</body>