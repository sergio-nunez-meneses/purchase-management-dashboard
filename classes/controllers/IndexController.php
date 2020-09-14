<?php

class IndexController
{

  public static function products_list()
  {
    $id = $_SESSION['id'];
    $last_products = (new IndexModel())->get_last_products($id);
    $products = (new IndexModel())->get_all_products($id);
    require('views/indexView.php');
  }
}
