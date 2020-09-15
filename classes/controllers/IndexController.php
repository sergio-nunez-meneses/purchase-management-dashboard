<?php

class IndexController
{

  public static function products_list()
  {
    if (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_GET['url'] === 'user_index'))
    { // detect if the action was triggered from user_index or edit page
      if (isset($_POST['edit-btn']))
      {
        $action = 'edit';
      }
      elseif (isset($_POST['delete-btn']))
      {
        // (new ActionsModel())->delete_product($_POST['product-id']);
        echo 'edit_last_products_form';
      }
    }
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
