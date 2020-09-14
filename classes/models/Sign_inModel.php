<?php

class Sign_inModel extends Database
{

  public function test_User_Login($user_Login)
  {
    $user_Selected = $this->run_query('SELECT * FROM users WHERE login = :loginSelected', ['loginSelected' => $user_Login]);
    $user_Selected = $user_Selected->fetch();
    return $user_Selected;
  }

}
