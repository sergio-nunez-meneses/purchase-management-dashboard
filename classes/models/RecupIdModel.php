<?php

class RecupIdModel
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = new PDO('mysql:host=localhost;dbname=purchase_management_dashboard;charset=utf8', 'root', '');
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

  public function test_User_Mail($user_Email)
  {
    $email_Selected = $this->run_query('SELECT login, pwd, email FROM users WHERE email = :emailSelected', ['emailSelected' => $user_Email]);
    $email_Selected = $email_Selected->fetch();
    return $email_Selected;
  }

}
