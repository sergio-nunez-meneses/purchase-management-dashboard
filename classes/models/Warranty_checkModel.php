<?php

class Warranty_checkModel extends Database
{

  public function test_Warranty_Date($user_id)
  {
    $warranty_date = $this->run_query('SELECT id, name, category, purchase_date, warranty_date FROM `products` WHERE user_id = :id AND warranty_date < DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 15 DAY)'), ['ud => $user-id']);
    $warranty_date = $warranty_date->fetch();
    return $warranty_date;
  }

}
