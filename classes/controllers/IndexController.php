<?php

class IndexController
{

  public static function products_list($url)
  {
    if (($_SERVER['REQUEST_METHOD'] == 'POST') && ($url === 'user_index' || $url === 'edit_product'))
    {
      if (isset($_POST['submit-btn']))
      {
        $action = 'edit';
      }
      elseif (isset($_POST['delete-btn']))
      {
        $action = 'delete';
      }
      ActionsController::actions($action, $url);
    }
    $id = $_SESSION['id'];

    if ($url === 'user_index')
    {
      $products = (new IndexModel)->get_last_products($id);
      $products_expire_soon = (new Warranty_checkModel())->test_Warranty_Date($id);
      $price = (new IndexModel())->price($id);
    }
    elseif ($url === 'edit_product')
    {
      $products = (new IndexModel)->get_all_products($id);
      $products_expire_soon = null;
      $price = null;
    }
    IndexView::display_products($products, $products_expire_soon, $price);
  }
}
