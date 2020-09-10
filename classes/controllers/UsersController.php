<?php

class UsersController
{

  public static function sign_in()
  {
      UsersController::user_logout();
      require('views/sign_inView.php');
  }

  public static function sign_up()
  {
      $_POST['infoCreate'] = '<div id="infoCreat" class="alert alert-success mx-5" role="alert">Votre compte a bien été créé. Cliquez <a href="javascript:void(0)" onclick="closeNav()">ici</a> pour retourner à la page de connexion.</div>';
      require('views/sign_inView.php');
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
      session_start();
      $_SESSION['id'] = ID;
      $_SESSION['login'] = LOGIN;
      $_SESSION['pwd'] = PWD;
      $_SESSION['email'] = EMAIL;
      $_SESSION['logged'] = true;
      require('views/testView.php');
  }

  public static function user_logout()
  {
      session_start ();
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
          // mail($to, $subject, $message, $headers); // A CONFIGURER !
          $_POST['infoMailTest'] = true;
      }
      else {
          $_POST['infoMailTest'] = false;
      }

  }

}
