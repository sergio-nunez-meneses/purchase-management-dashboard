<?php

class IndexController
{

  public static function products_list()
  {
    $products = (new IndexModel())->get_all_products();
    require('views/indexView.php');
  }
}
