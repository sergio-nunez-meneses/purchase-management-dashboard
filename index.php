<?php
require('include/auto_class_loader.php');

// $str = 'dqsfsd_èqsdàç_)àç sf5466546qdf ';
// echo 'strlen: ' . strlen(utf8_decode($str)) . '<br>';
// echo 'mb_strlen: ' . mb_strlen($str, '8bit') . '<br>';

// $url = explode('/', $_SERVER['REQUEST_URI']);
// var_dump($url);

if ($_SERVER['REQUEST_URI'] === '/' || $_SERVER['REQUEST_URI'] === '') {
  // echo 'url: ' . $_SERVER['REQUEST_URI'] . '<br>';
  ActionsController::actions_form();
} elseif ($_SERVER['REQUEST_URI'] === '/other') {
  // echo 'url: ' . $_SERVER['REQUEST_URI'] . '<br>';
} else {
  // echo 'url: ' . $_SERVER['REQUEST_URI'] . '<br>';
  ActionsController::actions_form();
}
