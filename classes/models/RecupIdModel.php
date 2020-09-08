<?php
// require('../classes/database/Database.php');

class RecupIdModel extends Database
{

  public function test_User_Mail($user_Email)
  {
    $email_Selected = $this->run_query('SELECT login, pwd, email FROM users WHERE email = :emailSelected', ['emailSelected' => $user_Email]);
    $email_Selected = $email_Selected->fetch();
    return $email_Selected;
  }

}
