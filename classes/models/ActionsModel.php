<?php

class ActionsModel extends Database
{

  public function user_exists($username)
  {
    $user = $this->run_query('SELECT login FROM users WHERE login = :username', ['username' => $username])->fetch();

    if ($username === $user['login'])
    {
      return true;
    } else
    {
      return false;
    }
  }

  public function get_user($username)
  {
    $user = $this->run_query('SELECT * FROM users WHERE login = :username', ['username' => $username])->fetch();
    return $user;
  }

  public function create_product($name, $reference, $category, $price, $purchase_date, $warranty_date, $place, $adress, $maintenance, $receipt, $manual, $user_id)
  {
    $this->run_query('INSERT INTO products VALUES (NULL, :name, :reference, :category, :price, :purchase_date, :warranty_date, :place, :adress, :maintenance, :receipt, :manual, :user_id)', [
      'name' => $name,
      'reference' => $reference,
      'category' => $category,
      'price' => $price,
      'purchase_date' => $purchase_date,
      'warranty_date' => $warranty_date,
      'place' => $place,
      'adress' => $adress,
      'maintenance' => $maintenance,
      'receipt' => $receipt,
      'manual' => $manual,
      'user_id' => $user_id
    ]);
  }

  public function edit_product()
  {
    // code...
  }

  public function archive_product()
  {
    // code...
  }

  public function delete_product()
  {
    // code...
  }
}
