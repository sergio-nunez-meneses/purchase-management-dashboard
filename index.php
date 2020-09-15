<?php
require('include/auto_class_loader.php');

$url = explode('/', $_GET['url']);

if (isset($url) === TRUE) {
  if ($url[0] === '/' || $url[0] === '') {
    UsersController::routeur();
  } elseif ($url[0] === 'sign') {
    UsersController::routeur();
  } elseif ($url[0] === 'user_index') {
    IndexController::products_list();
  } elseif (($url[0] === 'create_product') || ($url[0] === 'edit_product')) {
    ActionsController::get_view($url[0]);
  } else {
    UsersController::routeur();
  }
} else {
  echo 'Error 404: page not found';
}
