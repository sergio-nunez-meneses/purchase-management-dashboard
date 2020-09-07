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
      require('views/sign_upView.php');
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
      else {
          throw new Exception('Login inconnu ou mot de passe erroné');
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
      $check_mail = (new RecupIdModel())->test_User_Mail(htmlspecialchars($_POST['mailRecupId']));
      if (isset($check_mail['email'])) {
          // Les variables
          $to = htmlspecialchars($_POST['mailRecupId']);
          $subject = 'My Personnal Dashboard - Mes identifiant et mot de passe';
          $message = 'Login : ' . $check_mail['login'] . ' // Mot de passe : ' . $check_mail['pwd'];
          $headers = 'From: My Personnal Dashboard';
          // Envoi de l'email
          // mail($to, $subject, $message, $headers); // A CONFIGURER !
      }
      else {
          $infoMail = "Adresse email inconnue ou erronée.";
      }

  }

}
