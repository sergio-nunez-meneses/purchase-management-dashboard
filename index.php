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
