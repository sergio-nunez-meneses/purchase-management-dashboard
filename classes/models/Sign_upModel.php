<?php

class Sign_upModel extends Database
{

  public function test_Login_Create($user_Login)
  {
    $test_Login_Create = $this->run_query('SELECT login FROM users WHERE login = :loginSelected', ['loginSelected' => $user_Login]);
    $test_Login_Create = $test_Login_Create->fetch();
    return $test_Login_Create;
  }

  public function test_Email_Create($user_Email)
  {
    $test_Email_Create = $this->run_query('SELECT email FROM users WHERE email = :emailSelected', ['emailSelected' => $user_Email]);
    $test_Email_Create = $test_Email_Create->fetch();
    return $test_Email_Create;
  }

  public function Create_User_Account($createLogin, $createPwd, $createMail)
  {
    $Create_User_Account = $this->run_query('INSERT INTO users(login, pwd, email) VALUES(:login, :pwd, :email)', ['login' => $createLogin, 'pwd' => password_hash($createPwd, PASSWORD_BCRYPT), 'email' => $createMail]);
  }
}
