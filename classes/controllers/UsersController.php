<?php

class UsersController
{

  public static function routeur()
  {
    try {
      if (isset($_GET['user'])) {
        if ($_GET['user'] == 'sign_in') {
          UsersController::sign_in();
        }
        elseif ($_GET['user'] == 'sign_up') {
          UsersController::sign_up();
        }
        elseif ($_GET['user'] == 'logged') {
          if (!empty(htmlspecialchars($_POST['user_login'])) AND !empty(htmlspecialchars($_POST['user_password']))) {
            $login_By_User = htmlspecialchars($_POST['user_login']);
            $pwd_By_User = htmlspecialchars($_POST['user_password']);
            if (isset($login_By_User) AND isset($pwd_By_User)) {
              UsersController::check_user_login();
            }
          }
        }
        else {
          UsersController::sign_in();
        }
      }
      else {
        UsersController::sign_in();
      }
    }
    catch (Exception $e) {
      echo 'Erreur : ' . $e->getMessage();
    }
  }


  public static function sign_in()
  {
    UsersController::user_logout();
    Sign_inView::sign_in();
  }

  public static function sign_up()
  {
    $check_userLogin = (new Sign_upModel())->test_Login_Create(htmlspecialchars($_POST['user_CreateLogin']));
    $check_userMail = (new Sign_upModel())->test_Email_Create(htmlspecialchars($_POST['user_CreateMail']));

    if (isset($check_userLogin['login'])) {
      $_POST['infoCreate'] = '<div id="infoCreate" class="alert alert-danger mx-5" role="alert">Cet identifiant existe déjà. Merci d\'en choisir un nouveau.</div>';
      $_POST['user_CreateLogin'] = null;
      Sign_inView::sign_in();
    }
    else if (isset($check_userMail['email'])) {
      $_POST['infoCreate'] = '<div id="infoCreate" class="alert alert-danger mx-5" role="alert">Cet email est déjà utilisé.<a id="linkRecupId" href="#modalRecupId" data-toggle="modal" class="modal-trigger"> Mot de passe oublié ?</a></div>';
      $_POST['user_CreateMail'] = null;
      Sign_inView::sign_in();
    }
    elseif (htmlspecialchars($_POST['user_CreatePassword']) !== htmlspecialchars($_POST['user_ConfirmPassword'])) {
      $_POST['infoCreate'] = '<div id="infoCreate" class="alert alert-danger mx-5" role="alert">Les deux mots de passe saisis ne sont pas identique.</div>';
      Sign_inView::sign_in();
    }
    else {
      $create_UserDB = (new Sign_upModel())->Create_User_Account(htmlspecialchars($_POST['user_CreateLogin']), htmlspecialchars($_POST['user_CreatePassword']), htmlspecialchars($_POST['user_CreateMail']));

      $_POST['infoCreate'] = '<div id="infoCreate" class="alert alert-success mx-5" role="alert">Votre compte a bien été créé. Cliquez <a href="javascript:void(0)" onclick="closeNav()">ici</a> pour retourner à la page de connexion.</div>';

      unset($_POST['user_CreateLogin']);
      unset($_POST['user_CreateMail']);
      unset($_POST['user_CreatePassword']);
      unset($_POST['user_ConfirmPassword']);
      Sign_inView::sign_in();
    }
  }

  public static function check_user_login()
  {
    $check_user = (new Sign_inModel())->test_User_Login(htmlspecialchars($_POST['user_login']));
    if (isset($check_user['login']) AND htmlspecialchars($_POST['user_password']) === $check_user['pwd']) {
      define('ID', $check_user['id']);
      define('LOGIN', $check_user['login']);
      define('PWD', $check_user['pwd']);
      define('EMAIL', $check_user['email']);
      UsersController::user_logged();
    }
    elseif (isset($check_user['login']) AND htmlspecialchars($_POST['user_password']) !== $check_user['pwd']) {
      $_POST['infoLogin'] = "<i class='fas fa-exclamation-triangle'></i> Mot de passe erroné pour cet identifiant.";
      UsersController::sign_in();
    }
    elseif (!isset($check_user['login'])) {
      $_POST['infoLogin'] = "<i class='fas fa-exclamation-triangle'></i> Identifiant inconnu. Veuillez vérifier les informations saisies.";
      UsersController::sign_in();
    }
  }

  public static function user_logged()
  {
    $_SESSION['id'] = ID;
    $_SESSION['login'] = LOGIN;
    $_SESSION['pwd'] = PWD;
    $_SESSION['email'] = EMAIL;
    $_SESSION['logged'] = true;

    IndexController::products_list();
  }

  public static function user_logout()
  {
    $_SESSION = array();
    session_destroy();
    unset($_SESSION);
    $_SESSION = null;
    $_SESSION['logged'] = false;
  }

  public static function check_mail_recup_id()
  {
    require('../classes/models/RecupIdModel.php');
    $check_mail = (new RecupIdModel())->test_User_Mail(htmlspecialchars($_POST['mailRecupId']));
    if (isset($check_mail['email'])) {
      // Les variables
      $to = htmlspecialchars($_POST['mailRecupId']);
      $subject = 'My Personnal Dashboard - Mes identifiant et mot de passe';
      $message = 'Login : ' . $check_mail['login'] . ' // Mot de passe : ' . $check_mail['pwd'];
      $headers = 'From: My Personnal Dashboard';
      // Envoi de l'email
      mail($to, $subject, $message, $headers);
      $_POST['infoMailTest'] = true;
    }
    else {
      $_POST['infoMailTest'] = false;
    }
  }

}
