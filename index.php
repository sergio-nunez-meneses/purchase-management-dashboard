<?php
require('include/auto_class_loader.php');

// base url in .htaccess: index.php?url=$1
$url = explode('/', $_GET['url']);

if ($url[0] === '/' || $url[0] === '') {
  UsersController::routeur();
} elseif ($url[0] === 'sign') {
  UsersController::routeur();
} elseif ($url[0] === 'actions') {
  ActionsController::actions_form();
} else {
  UsersController::routeur();
}

// try {
//   if (isset($_GET['user'])) {
//       if ($_GET['user'] == 'sign_in') {
//         UsersController::sign_in();
//       }
//       elseif ($_GET['user'] == 'sign_up') {
//         UsersController::sign_up();
//       }
//       elseif ($_GET['user'] == 'logged') {
//
//           if (!empty(htmlspecialchars($_POST['user_login'])) AND !empty(htmlspecialchars($_POST['user_password']))) {
//
//               $login_By_User = htmlspecialchars($_POST['user_login']);
//               $pwd_By_User = htmlspecialchars($_POST['user_password']);
//
//               if (isset($login_By_User) AND isset($pwd_By_User)) {
//                 UsersController::check_user_login();
//               }
//           }
//       }
//       else {
//           UsersController::sign_in();
//       }
//   }
//   else {
//       UsersController::sign_in();
//   }
//
// }
// catch (Exception $e) {
//     echo 'Erreur : ' . $e->getMessage();
// }
