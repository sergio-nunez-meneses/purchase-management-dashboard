<?php
require('../classes/controllers/UsersController.php'); // !!!!!!!!!

// Personnalisation du Titre
$title = 'Dashboard ACS - Test';

// Personnalisation du CCS propre à cette "view"
$specialStyleCSS = '<link rel="stylesheet" type="text/css" href="../public/CSS/modalRecupIdStyle.css">';

// Personnalisation du javascript propre à cette "view"
$specialJS = null; // <script type="text/javascript"src="public/JS/scriptPersonnalisé.js"></script> ou mettre null si pas de script spécial

// Appel le controller le formulaire est validé
if (isset($_POST['mailRecupId'])) {
      UsersController::check_mail_recup_id();
}
else {
  $_POST['infoMail'] = '<p><br>Renseignez votre e-mail ci-dessous.<br>
  Vous recevrez vos identifiants et mot de passe<br>d\'ici quelques instants à l\'adresse e-mail indiquée.<br></p>';
}

// Contenu de cette "view"
ob_start(); ?>
<div id="modalRecupIdGlobal" class="">
    <div id="modalHeader" class="modal-header">
        <h5 class="modal-title">Identifiant ou mot de passe oublié ?</h5>
    </div>
    <div id="modalBody" class="modal-body">
        <?php
            echo $_POST['infoMail'];
        ?>
        <form class="" action="#modalRecupId" method="post">
            <div class="form-group">
                <input name="mailRecupId" type="email" class="form-control" required="required" autocomplete="off" placeholder="Indiquez votre e-mail" pattern=".*@.*[.].*">
            </div>
            <button id="close" type="submit" name="sendMyId" class="btn btn-secondary">Send</button>
        </form>
    </div>
    <!-- <div id="modalFooter" class="modal-footer">
        <button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    </div> -->
</div>

<?php
$content = ob_get_clean();

require('template.php');
?>
