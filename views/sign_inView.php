<?php
$title = 'Dashboard ACS - Bienvenue';
$specialStyleCSS = '<link rel="stylesheet" type="text/css" href="public/CSS/sign_inStyle.css">';

ob_start(); ?>

<div id="page" class="container-fluid">
    <div class="contenu">
        <header>
            <h2>Welcome to</h2>
            <div class="row">
                <div id="logo">
                    <img src="public/images/logo.png" class="responsive-img">
                </div>
                <h1>My Personnal Dashboard</h1>
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
                <a id="linkRecupId" href="#modalRecupId" class="modal-trigger">Mot de passe<span class="color">oublié ?</span></a>
            </div>

            <button type="submit" class="button-submit button_form" id="btn_valide_connexion" onclick="valide_connexion(); return false;">
                <span class="valid">Connexion</span>
                <svg  class="arrow" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      width="15.465px" height="26px" viewBox="0 0 15.465 26" enable-background="new 0 0 15.465 26" xml:space="preserve">
                    <polygon fill="#ffffff" points="0,2.465 2.466,0 15.465,13.001 2.466,26 0,23.536
  							10.535,13.001 0,2.465 "/>
                </svg>
            </button>
            </form>
            <?php
            var_dump($_SESSION['logged']); //A SUPPRIMER !!!!!!!!
              ?>
        </main>
    </div>

</div>

<div id="modalRecupId" class="modal">
    <div class="modal-content">
        <iframe src="/manager/recup_all_identifiants.php?v=mod"></iframe>
    </div>
</div>







<?php
$content = ob_get_clean();
require('template.php');
?>
