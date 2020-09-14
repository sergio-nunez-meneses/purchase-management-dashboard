<?php

class IndexModel extends Database
{

  public function get_all_products($id)
  {
    $stmt = $this->run_query('SELECT * FROM products WHERE user_id = :id ORDER BY id DESC', ['id' => $id]);
    $all_products = $stmt->fetchAll();
    return $all_products;
  }

  public function get_last_products($id)
  {
    $stmt = $this->run_query('SELECT * FROM products WHERE user_id = :id ORDER BY id DESC LIMIT 3', ['id' => $id]);
    $last_product = $stmt->fetchAll();
    return $last_product;
  }
}
