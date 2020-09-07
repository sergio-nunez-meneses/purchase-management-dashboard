<?php
// Personnalisation du Titre
$title = 'Dashboard ACS - Bienvenue';

// Personnalisation du CCS propre à cette "view"
$specialStyleCSS = '<link rel="stylesheet" type="text/css" href="public/CSS/sign_inStyle.css">';

// Personnalisation du javascript propre à cette "view"
$specialJS = null; // <script type="text/javascript"src="public/JS/scriptPersonnalisé.js"></script> ou mettre null si pas de script spécial

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
            <div class="instructions">Saisissez vos identifiant et mot de passe pour vous connecter</div>
        </header>

        <main class="">
            <form class="" action="index.php?user=logged" method="post">
                <div class="field input-group input-group-lg">
                  <div class="input-group-prepend">
                    <span id="spanLogin" class="input-group-text"><img src="public/images/icone-user.png"></span>
                  </div>
                  <input id="user_login" name="user_login" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required="required" autocomplete="off" placeholder="Tapez votre identifiant ici">
                </div>

                <div class="field input-group input-group-lg">
                  <div class="input-group-prepend">
                    <span id="spanPassword" class="input-group-text"><img src="public/images/icone-password.png"></span>
                  </div>
                  <input id="user_password" name="user_password" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required="required" autocomplete="off" placeholder="Votre mot de passe">
                </div>

            <div id="oubli_form">
                <a id="linkRecupId" href="#modalRecupId" data-toggle="modal" class="modal-trigger">Mot de passe <span class="color">oublié ?</span></a>
            </div>

            <button type="submit" class="btn button-submit button_form px-4 py-3 mt-2" id="btn_valide_connexion" onclick="valide_connexion(); return false;">
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
        <p>Copyright © 2020 <a id="FooterSpy" href="#modalFooterSpy" data-toggle="modal" class="modal-trigger">S.P.Y.</a> - All rights reserved</p>
    </footer>

</div>


<!-- Modal du footer -->
<div class="modal fade" id="modalFooterSpy" tabindex="-1" aria-labelledby="modalSpyDev" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php
                include('views/modalFooterSPY.php');
            ?>
        </div>
    </div>
</div>

<!-- Modal de l'oubli du login/password -->
<div class="modal fade" id="modalRecupId" tabindex="-1" role="dialog" aria-labelledby="modalRecupId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php
                include('views/modalRecupId.php');
            ?>
        </div>
    </div>
</div>







<?php
$content = ob_get_clean();

require('template.php');
?>
