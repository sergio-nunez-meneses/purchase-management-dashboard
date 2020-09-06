<?php
// Personnalisation du Titre
$title = 'Dashboard ACS - Bienvenue';

// Personnalisation du CCS propre à cette "view"
$specialStyleCSS = '<link rel="stylesheet" type="text/css" href="public/CSS/sign_inStyle.css">';

// Contenu de cette "view"
ob_start(); ?>

<div id="page" class="container-fluid d-flex flex-column">
    <div class="contenu d-flex flex-column align-items-start justify-content-center">
        <header>
            <h3>Welcome to</h3>
            <div class="row">
                <div id="logo">
                    <img src="public/images/logo.png" class="responsive-img">
                </div>
                <h1 class="font-weight-bold">My Personnal Dashboard</h1>
            </div>
            <h2>Connectez-vous</h2>
            <h2>à votre tableau de bord</h2>
            <div class="instructions">Saisissez vos identifiant et mot de passe pour vous connecter</div>
        </header>

        <main class="">
            <form id="fields" class="" action="index.php?user=logged" method="post">
                <div class="field">
                    <label id="login_label" for="user_login"><img src="public/images/icone-user.png" class=""></label>
                    <input type="text" name="user_login" id="user_login" required="required" autocomplete="off" placeholder="Tapez votre identifiant (login) ici"/>
                </div>

                <div class="field">
                    <label id="password_label" for="user_password"><img src="public/images/icone-password.png" class=""></label>
                    <input type="password" name="user_password" id="user_password" required="required" autocomplete="off" placeholder="Votre mot de passe"/>
                </div>


            <div id="oubli_form">
                <a id="linkRecupId" href="#modalRecupId" class="modal-trigger">Mot de passe <span class="color">oublié ?</span></a>
            </div>

            <button type="submit" class="btn button-submit button_form px-4 py-3 mt-5" id="btn_valide_connexion" onclick="valide_connexion(); return false;">
                <span class="valid">Connexion</span>
                <svg  class="arrow" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      width="16px" height="20px" viewBox="0 0 15.465 26" enable-background="new 0 0 15.465 26" xml:space="preserve">
                    <polygon fill="black" points="0,2.465 2.466,0 15.465,13.001 2.466,26 0,23.536
  							10.535,13.001 0,2.465 "/>
                </svg>
            </button>
            </form>
        </main>
    </div>

    <footer class="d-flex flex-row align-items-end justify-content-end">
        <p>Copyright © 2020 <a id="spyDev" href="#modalSpyDev" data-toggle="modal" class="modal-trigger">S.P.Y.</a> - All rights reserved</p>
    </footer>

</div>


<!-- Modal du footer -->
<div class="modal fade" id="modalSpyDev" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div id="modalHeader" class="modal-header">
        <h5 class="modal-title">S.P.Y. - Everything, Everywhere, Everytime</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modalBody" class="modal-body">
        <h3>Who are we ?</h3>
        <p>Click on our names below to see our LikedIn profiles.</p>
        <a href="https://www.linkedin.com/in/sergio-nunez-meneses-826584a0/" target="_blank">Sergio NUNEZ MENESES</a> | <a href="https://www.linkedin.com/in/philippe-perechodov/" target="_blank">Philippe PERECHODOV</a> | <a href="https://www.linkedin.com/in/yacine-sbai/" target="_blank">Yacine SBAÏ</a>
        <hr>
        <p>- Dashboard Project - <a href="https://www.accesscodeschool.fr" target="_blank">ACS</a> -</p>
        <p>Site created in HTML - CSS - PHP - MySQL - javascript</p>
        <a id="github" href="https://github.com/sergio-nunez-meneses/purchase-management-dashboard" target="_blank"><i class="fab fa-github"></i></a>
      </div>
      <div id="modalFooter" class="modal-footer">
        <button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de l'oubli du login/password -->
<div id="modalRecupId" class="modal">
    <div class="modal-content">
        <iframe src="/manager/recup_all_identifiants.php?v=mod"></iframe>
    </div>
</div>







<?php
$content = ob_get_clean();

require('template.php');
?>
