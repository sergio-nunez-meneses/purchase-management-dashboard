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
    }
    elseif ($url === 'edit_product')
    {
      $products = (new IndexModel)->get_all_products($id);
    }
    IndexView::display_last_products($products);
  }
}
