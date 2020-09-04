<?php

class IndexModel extends Database
{

  public function get_all_products()
  {
    $stmt = $this->run_query('SELECT * FROM products WHERE users_id = 1');
    $products = $stmt->fetchAll();
    return $products;
  }
}
