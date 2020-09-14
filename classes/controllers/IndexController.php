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
}
