<?php
require('include/auto_class_loader.php');

try {
    if (isset($_GET['user'])) {
        if ($_GET['user'] == 'sign_in') {
          UsersController::sign_in();
        }
        elseif ($_GET['user'] == 'sign_up') {
          // sign_up();
        }
        elseif ($_GET['user'] == 'logged') {

            if (!empty(htmlspecialchars($_POST['user_login'])) AND !empty(htmlspecialchars($_POST['user_password']))) {

                $login_By_User = htmlspecialchars($_POST['user_login']);
                $pwd_By_User = htmlspecialchars($_POST['user_password']);

                if (isset($login_By_User) AND isset($pwd_By_User)) {
                  UsersController::check_user_login();
                }
            }
            else {
                throw new Exception('Indiquez le nom du compte et le mot de passe pour accéder à votre espace privé ou cliquez sur "créer mon compte" pour créer un nouvel espace privé.');
            }
        }
        else {
            throw new Exception('blablabla');
        }
    }

    elseif (isset($_GET['mail'])) {
      if ($_GET['mail'] == 'try') {
        if (!empty(htmlspecialchars($_POST['mailRecupId']))) {

            $mail_By_User = htmlspecialchars($_POST['mailRecupId']);

            if (isset($mail_By_User)) {
              UsersController::check_mail_recup_id();
            }
        }
        else {
            throw new Exception('Indiquez l\'e-mail que vous avez renseigné lors de la création de votre compte.');
        }
      }
      elseif ($_GET['mail'] == 'OK') {
        echo 'mail OK';
      }
      elseif ($_GET['mail'] == 'KO') {
        echo 'mail KO';
      }
    }

    else {
        UsersController::sign_in();
    }
}
catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
