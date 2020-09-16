<?php

class Sign_inView
{

  public static function sign_in()
  {
    // Personnalisation du Titre
    $title = 'Dashboard ACS - Bienvenue';

    // Personnalisation du CCS propre à cette "view"
    $specialStyleCSS = '<link rel="stylesheet" type="text/css" href="public/CSS/sign_inStyle.css">';

    // Personnalisation du javascript propre à cette "view"
    $specialJS = '<script type="text/javascript"src="public/JS/scriptModalRecupId.js"></script>'; // ou mettre null si pas de script spécial

    // Contenu de cette "view"
    ob_start(); ?>

    <div id="page" class="container-fluid d-flex flex-column">
      <div class="contenu d-flex flex-column align-items-start justify-content-center">
        <header>
          <h3>Welcome to</h3>
          <div id="titre" class="row">
            <div id="logo">
              <img src="public/images/logo.png" class="responsive-img">
            </div>
            <h1 class="font-weight-bold">My Personnal Dashboard</h1>
          </div>
          <h2>Connectez-vous</h2>
          <h2>à votre tableau de bord</h2>
          <?php
          if (isset($_POST['infoLogin'])) {
            echo '<div class="instructionsAlerte">' . $_POST['infoLogin'] . '</div>';
          }
          else {
            echo '<div class="instructions">Saisissez vos identifiant et mot de passe pour vous connecter</div>';
          }
          ?>
        </header>

        <main class="">
          <form class="" action="/sign" method="post">
            <div class="field input-group input-group-lg">
              <div class="input-group-prepend">
                <span id="spanLogin" class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input id="user_login" name="user_login" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required="required" autocomplete="off" placeholder="Tapez votre identifiant ici">
            </div>

            <div class="field input-group input-group-lg">
              <div class="input-group-prepend">
                <span id="spanPassword" class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
              </div>
              <input id="user_password" name="user_password" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required="required" autocomplete="off" placeholder="Votre mot de passe">
            </div>

            <div id="oubli_form">
              <a id="linkRecupId" href="#modalRecupId" data-toggle="modal" class="modal-trigger">Mot de passe <span class="color">oublié ?</span></a>
            </div>

            <button type="submit" class="btn button-submit button_form px-4 py-3 mt-2" id="btn_valide_connexion">
              <span class="valid">Connexion</span>
              <svg  class="arrow" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              width="16px" height="20px" viewBox="0 0 15.465 26" enable-background="new 0 0 15.465 26" xml:space="preserve">
              <polygon fill="black" points="0,2.465 2.466,0 15.465,13.001 2.466,26 0,23.536
              10.535,13.001 0,2.465 "/>
            </svg>
          </button>
        </form>

        <div class="my-5">
          <a id="create_form" style="cursor:pointer" onclick="openNav()">Créer un nouveau <span class="color">compte</span></a>
          <!-- Sidebar de création d'un compte -->
          <?php
          Sign_upView::sign_up();
          ?>
        </div>

      </main>
    </div>

    <footer class="d-flex flex-row align-items-end justify-content-end">
      <p>Copyright © 2020 <a id="FooterSpy" href="#modalFooterSpy" data-toggle="modal" class="modal-trigger">S.P.Y.</a> - All rights reserved</p>
      <!-- Modal du footer -->
      <?php
      ModalFooterSPYView::modalFooterSPY();
      ?>
    </footer>

  </div>

  <!-- Modal de l'oubli du login/password -->
  <div class="modal fade" id="modalRecupId" tabindex="-1" role="dialog" aria-labelledby="modalRecupId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <iframe id="iframeModalRecupId" class="rounded" src="templates/modalRecupIdView.php"></iframe>
      </div>
    </div>
  </div>

  <?php
  $content = ob_get_clean();

  require('templates/template.php');

  }
}
?>
