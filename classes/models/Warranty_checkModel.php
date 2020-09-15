<?php

class Warranty_checkModel extends Database
{

  public function test_Warranty_Date($user_id)
  {
    $stmt = $this->run_query("SELECT id, name, category, DATE_FORMAT(purchase_date, '%d/%m/%Y') AS purchase_date_fr, DATE_FORMAT(warranty_date, '%d/%m/%Y') AS warranty_date_fr FROM products WHERE user_id = :id AND warranty_date < DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 15 DAY)", ['id' => $user_id]);
    $warranty_date = $stmt->fetchAll();
    return $warranty_date;
  }

}
