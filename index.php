<?php
require('include/auto_class_loader.php');

$url = explode('/', $_GET['url']);

if ($url[0] === '/' || $url[0] === '') {
  ActionsController::actions_form();
} elseif ($url[0] === 'actions') {
  ActionsController::actions_form();
} else {
  ActionsController::actions_form();
}
