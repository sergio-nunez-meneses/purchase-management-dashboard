<?php
require('include/auto_class_loader.php');

?>

<!-- Pour de faux !! c'est du test ! -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <p>Bonjour !</p>

    <?php

      $conn = new Database();
      $users = $conn->run_query('SELECT * FROM users');
      $users = $users->fetchAll();

      foreach ($users as $row) {
        echo $row['id'] . '<br>';
        echo $row['login'] . '<br>';
        echo $row['pwd'] . '<br> <hr>';
      }

      $idTest = 2;
      $req = $conn->run_query('SELECT login, pwd FROM users WHERE id = :idTest', ['idTest' => $idTest]);
      $user = $req->fetch();

      echo "<p>Mon ID choisi : $idTest </p>";
      echo 'Login : ' . $user['login'] . '<br>';
      echo 'Mot de passe : ' . $user['pwd'] . '<br>';

    ?>

  </body>
</html>
