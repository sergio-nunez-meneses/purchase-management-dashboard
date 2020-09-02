<?php
require('tools/sql.php');

class Database
{

  private $pdo;

  public function __construct()
  {
    $this->pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHAR, DB_USER, DB_PWD, PDO_OPTIONS);

    echo 'connected to ' . DB_NAME . '<br>'; // just for debugging
  }
}
