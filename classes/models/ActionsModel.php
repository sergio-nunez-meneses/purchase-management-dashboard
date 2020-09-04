<?php

class ActionsModel extends Database
{

  public function user_exists($user_id)
  {
    $user = $this->run_query('SELECT id FROM users WHERE id = :user_id', ['user_id' => $user_id])->fetch();

    if ($user_id == $user['id'])
    {
      return true;
    } else
    {
      return false;
    }
  }

  public function product_exists($product_id)
  {
    $product = $this->run_query('SELECT id FROM products WHERE id = :product_id', ['product_id' => $product_id])->fetch();

    if ($product_id == $product['id'])
    {
      return true;
    } else
    {
      return false;
    }
  }

  public function get_user($user_id)
  {
    $user = $this->run_query('SELECT * FROM users WHERE id = :user_id', ['user_id' => $user_id])->fetch();
    return $user;
  }

  public function get_product($product_id)
  {
    $product = $this->run_query('SELECT * FROM products WHERE id = :product_id', ['product_id' => $product_id])->fetch();
    return $product;
  }

  public function create_product($name, $reference, $category, $price, $purchase_date, $warranty_date, $place, $address, $maintenance, $receipt, $manual, $user_id)
  {
    $this->run_query('INSERT INTO products VALUES (NULL, :name, :reference, :category, :price, :purchase_date, :warranty_date, :place, :address, :maintenance, :receipt, :manual, :user_id)', [
      'name' => $name,
      'reference' => $reference,
      'category' => $category,
      'price' => $price,
      'purchase_date' => $purchase_date,
      'warranty_date' => $warranty_date,
      'place' => $place,
      'address' => $address,
      'maintenance' => $maintenance,
      'receipt' => $receipt,
      'manual' => $manual,
      'user_id' => $user_id
    ]);
  }

  public function edit_product($id, $name, $reference, $category, $price, $purchase_date, $warranty_date, $place, $address, $maintenance, $receipt, $manual, $user_id)
  {
    $this->run_query('UPDATE products SET name = :name, reference = :reference, category = :category, price = :price, purchase_date = :purchase_date, warranty_date = :warranty_date, purchase_place = :place, place_address = :address, product_maintenance = :maintenance, purchase_receipt = :receipt, user_manual = :manual, user_id = :user_id WHERE id = :id', [
      'name' => $name,
      'reference' => $reference,
      'category' => $category,
      'price' => $price,
      'purchase_date' => $purchase_date,
      'warranty_date' => $warranty_date,
      'place' => $place,
      'address' => $address,
      'maintenance' => $maintenance,
      'receipt' => $receipt,
      'manual' => $manual,
      'user_id' => $user_id,
      'id' => $id,
    ]);
  }

  public function archive_product($product_id)
  {
    // code...
  }

  public function delete_product($product_id)
  {
    $this->run_query('DELETE FROM products WHERE id = :product_id', ['product_id' => $product_id]);
  }
}
