<?php

class IndexController
{

  public static function products_list()
  {
    $id = $_SESSION['id'];
    $last_products = (new IndexModel())->get_last_products($id);
    IndexView::display_last_products($last_products);
  }

  public static function get_all_products_view()
  {
    $id = $_SESSION['id'];
    $all_products = (new IndexModel())->get_all_products($id);
    IndexView::display_all_products($all_products);
  }

  public static function Warranty_Date_Soon_Expire()
  {
    $id = $_SESSION['id'];
    $products_expire_soon = (new Warranty_checkModel())->test_Warranty_Date($id);
    IndexView::display_expire_soon_products($products_expire_soon);
  }

  
}
