<?php
require('tools/sql.php');

class Database
{

  private $pdo;

  protected function connexion()
  {
    $this->pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHAR, DB_USER, DB_PWD, PDO_OPTIONS);

    if (empty($this->pdo) === FALSE)
    {
      // echo 'connected to ' . DB_NAME . '<br><hr>'; // just for debugging
      return TRUE;
    }
  }

  protected function run_query($sql, $placeholders = [])
  {
    if ($this->connexion() === TRUE)
    {
      if (empty($placeholders))
      {
        return $this->pdo->query($sql)->fetchAll();
      }
      else
      {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($placeholders);
        return $stmt;
      }
    }
  }
}
