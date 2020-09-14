<?php
spl_autoload_register('loader');

function loader($class_name) {
  $path = $parent_folder = '';

  if ($class_name === 'Database') {
    $parent_folder = 'database';
  } elseif (substr($class_name, -10) === 'Controller') {
    $parent_folder = 'controllers';
  } elseif (substr($class_name, -5) === 'Model') {
    $parent_folder = 'models';
  }

  $path = "classes/$parent_folder/$class_name.php";

  require_once $path;
}
