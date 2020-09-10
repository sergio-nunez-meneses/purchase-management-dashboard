<?php

// Personnalisation du Titre
$title = 'Dashboard ACS - Test';

// Personnalisation du CCS propre à cette "view"
$specialStyleCSS = '<link rel="stylesheet" type="text/css" href="../public/CSS/modalRecupIdStyle.css">';

// Personnalisation du javascript propre à cette "view"
$specialJS = '<script type="text/javascript"src="../public/JS/scriptModalRecupId.js"></script>'; // ou mettre null si pas de script spécial

// Appel le controller le formulaire est validé
if (isset($_POST['mailRecupId'])) {
    include('../classes/controllers/UsersController.php');
    UsersController::check_mail_recup_id();

    if ($_POST['infoMailTest']) {
      $infoMail = '<div class="alert alert-success" role="alert">
Un e-mail a été envoyé à l\'adresse <br>"' . $_POST['mailRecupId'] . '"<br> avec vos identifiants et mot de passe.<br>Vous le recevrez dans quelques intants.</div>';
    }
    else {
        $infoMail = '<div class="alert alert-danger" role="alert">L\'adresse e-mail <br>"' . $_POST['mailRecupId'] . '"<br> est inconnue ou erronée.<br>Voulez-vous <a href="">créer un compte</a> ?</div>';
    }
}
else {
  $infoMail = '<p><br>Renseignez votre e-mail ci-dessous.<br>
  Vous recevrez vos identifiants et mot de passe<br>d\'ici quelques instants à l\'adresse e-mail indiquée.<br></p>';
}

// Contenu de cette "view"
ob_start(); ?>
<div id="modalRecupIdGlobal" class="">
    <div id="modalHeader" class="modal-header">
        <h5 class="modal-title">Identifiant ou mot de passe oublié ?</h5>
        <button type="button" class="close" aria-label="Close" data-dismiss="modal" onclick="">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div id="modalBody" class="modal-body">
        <?php
            echo $infoMail;
        ?>
        <form class="" action="#modalRecupId" method="post">
            <div class="form-group">
                <input name="mailRecupId" type="email" class="form-control" required="required" autocomplete="on" placeholder="Indiquez votre e-mail" pattern=".*@.*[.].*">
            </div>
            <button id="close" type="submit" name="sendMyId" class="btn btn-secondary">Send</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();

require('template.php');
?>
