<?php

class IndexController
{

  public static function products_list()
  {
    $id = 2; // $_session['id']
    $last_products = (new IndexModel())->get_last_products($id);
    $products = (new IndexModel())->get_all_products($id);

    $price = (new IndexModel())->price($id);

    require('views/indexView.php');
  }
}
