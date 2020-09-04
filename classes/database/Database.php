<?php
require('tools/sql.php');

class Database
{

  private $pdo;

  public function __construct()
  {
    $this->pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHAR, DB_USER, DB_PWD, PDO_OPTIONS);
    // echo 'Connected to ' . DB_NAME . '<br><hr>'; // just for debugging
  }

  public function run_query($sql, $placeholders = [])
  {
    if (empty($placeholders))
    {
      return $this->pdo->query($sql)->fetchAll();
    } else
    {
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($placeholders);
      return $stmt;
    }
  }
}
