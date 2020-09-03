<?php

class ActionsController
{

  public static function actions_form()
  {
    $action = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      if (isset($_POST['create-product']))
      {
        $action = 'create';
      } elseif (isset($_POST['edit-product']))
      {
        $action = 'edit';
      } elseif (isset($_POST['archive-product']))
      {
        $action = 'archive';
      } elseif (isset($_POST['delete-product']))
      {
        $action = 'delete';
      }
      ActionsController::actions($action);
    }
    require('views/actionsView.php');
  }

  public static function actions($action)
  {
    if (empty($action))
    {
      echo 'Failed to perform requested action.';
    } else
    {
      // check if fields are empty, too short or too long
      // reformat incoming date (0000-00-00 00:00:00)
      // check $_FILES bug
      // sanitize variables (filter_var($var, FILTER_SANITIZE_STRING))
      $name = $_POST['product-name'];
      $reference = $_POST['product-reference'];
      $category = $_POST['product-category'][0];
      $price = $_POST['product-price'];
      $purchase_date = '2020-08-11 00:00:00';
      $warranty_date = '2021-08-11 00:00:00';
      $place = $_POST['purchase-place'][0];
      $adress = $_POST['place-adress'];
      $maintenance = $_POST['product-maintenance'];
      $receipt = 'someFile.jpg';
      $manual = $_POST['user-manual'];
      $user_id = $_POST['user-id'];

      // sequence of conditions to check the action and call the corresponding method
      if ($action === 'create')
      {
        (new ActionsModel())->create_product($name, $reference, $category, $price, $purchase_date, $warranty_date, $place, $adress, $maintenance, $receipt, $manual, $user_id);
        echo "$action<br>";
      }
    }
  }
}
