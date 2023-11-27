<?php
require_once "../includes/head.php";
require_once "../controllers/SujetController.php";
require_once "../controllers/MessageController.php";
session_start();

$sujetController = new SujetController();
$sujet = $sujetController->getSujetById($_GET['id']);
$messageController = new MessageController();
$messages = $messageController->getMessages($_GET['id']);

if ($_SESSION == false) {
  header('Location: index.php');
}

if(isset($_POST)){
  if (isset($_POST['message']) && !empty($_POST['message'])){
    $messageController->createMessage($_POST['message'], $_SESSION['id'], $_GET['id']);
    echo "<meta http-equiv='refresh' content='0'>";
  }
  if (isset($_POST['deleteMessage'])) {
    $id = $_POST['idMessage'];
    $messageController->deleteMessage($id);
    echo "<meta http-equiv='refresh' content='0'>";
}
}  


?>

<head>
  <title>Forum</title>
</head>

<body>
  <?php require_once "../includes/header.php"; ?>

  <section class="img5-wrapper1" id="img5">
    <div>
      <h4>Apprendre à jouer</h4>
    </div>
  </section>

  <div id="background">
    <?php echo
      "<section class='topic-container'>
          <div class='user-topic-container'>";
          if($sujet->getUtilisateur() == null){
            echo "<img id='user-img-topic' src='../img/deleted-user.png' alt=''>
              <p>DELETED USER</p>";
          }else{
              echo "<img id='user-img-topic' src='../img/".$sujet->getUtilisateur()->getPhotoUtilisateur()."' alt=''>
              <p>".$sujet->getUtilisateur()->getPrenomUtilisateur()."</p>";
          };
          echo
          "</div>
          <div class='topic-content-container'>
            <p class='topic-style'>" . $sujet->getTitreSujet() . "</p>
            <p class='date-text'>Sujet publié le " . $sujet->getDateSujet() . "</p>
            <p class='message'>" . $sujet->getMessageSujet() . "</p>
          </div>
        </section>";
        if($messages){
          foreach ($messages as $message){
            echo
            "<section class='topic-container'>
            <div class='user-topic-container'>";
            if ($message->getUtilisateur() == null){
              echo "<img id='user-img-topic' src='../img/deleted-user.png' alt=''>
              <p>DELETED USER</p>";
            }else{
              echo "<img id='user-img-topic' src='../img/".$message->getUtilisateur()->getPhotoUtilisateur()."' alt=''>
              <p>".$message->getUtilisateur()->getPrenomUtilisateur()."</p>";
            }
            echo
            "</div>
            <div class='topic-content-container'>
              <p class='date-text'>Message publié le " . $message->getDateMessage() . "</p>
              <p class='message'>" . $message->getMessage() . "</p>";
            if($_SESSION['id'] === $message->getUtilisateur()->getId()){
              echo "<form method='POST' action=#>
                  <input type='hidden' name='idMessage' value='".$message->getId()."'/>
                  <button type='submit' name='deleteMessage'>Supprimer</button>
              </form>";
           };
           echo
           "</div>
            </section>";
          }
        }
    ?>

    <form action="#" method="POST" class="new-topic-container">
      <h5>Votre message:</h5>
      <p class="none" id="errorMessage">Champs obligatoire</p>
      <textarea name="message" class="message-field" cols="30" rows="8"
        placeholder="Ecrivez votre message..."></textarea>
      <div id="btn-ajout-container">
        <button type="submit" name="submitMessage" id="btnAjouter" class="btn ajout-btn">Ajouter</button>
      </div>
    </form>
  </div>
</body>