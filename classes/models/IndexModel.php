<?php

class IndexModel extends Database
{

  public function get_all_products($id)
  {
    $stmt = $this->run_query('SELECT * FROM products WHERE user_id = :id ORDER BY id DESC', ['id' => $id]);
    $products = $stmt->fetchAll();
    return $products;
  }

  public function get_last_products($id)
  {
    $stmt = $this->run_query('SELECT * FROM products WHERE user_id = :id ORDER BY id DESC LIMIT 3', ['id' => $id]);
    $product = $stmt->fetchAll();
    return $product;
  }
}
