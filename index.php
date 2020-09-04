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

            $login_By_User = htmlspecialchars($_POST['user_login']);
            $pwd_By_User = htmlspecialchars($_POST['user_pwd']);

            if (!empty($login_By_User) AND !empty($pwd_By_User) AND isset($login_By_User) AND isset($pwd_By_User)) {

                $user_Login_Result = UsersController::check_user_login();

            }
            else {
                throw new Exception('Indiquez le nom du compte et le mot de passe pour accéder à votre espace privé ou cliquez sur "créer mon compte" pour créer un nouvel espace privé.');
            }
        }
        else {
            throw new Exception('blablabla');
        }
    }
    else {
        UsersController::sign_in();
    }
}
catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
