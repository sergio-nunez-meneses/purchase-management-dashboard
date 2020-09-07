<?php
require('include/auto_class_loader.php');

// $url = explode('/', $_SERVER['REQUEST_URI']);

if ($_SERVER['REQUEST_URI'] === '/' || $_SERVER['REQUEST_URI'] === '') {
  // echo 'url: ' . $_SERVER['REQUEST_URI'] . '<br>';
  ActionsController::actions_form();
} elseif ($_SERVER['REQUEST_URI'] === '/other') {
  // echo 'url: ' . $_SERVER['REQUEST_URI'] . '<br>';
} else {
  // echo 'url: ' . $_SERVER['REQUEST_URI'] . '<br>';
  ActionsController::actions_form();
}
