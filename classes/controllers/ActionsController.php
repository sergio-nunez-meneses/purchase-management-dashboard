<?php

class ActionsController
{

  public static function get_view($url)
  {
    if (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_GET['url'] === 'create_product' || $_GET['url'] === 'edit_product'))
    {
      $url = $_GET['url'];

      if (isset($_POST['create-product']))
      {
        $action = 'create';
      }
      elseif (isset($_POST['edit-product']))
      {
        $action = 'edit';
      }
      elseif (isset($_POST['delete-product']))
      {
        $action = 'delete';
      }
      ActionsController::actions($action, $url);
    }
    ActionsView::display($url);
  }

  public static function actions($action, $url)
  {
    $error = $product_id = FALSE;
    $user_id = $purchase_date = $warranty_date = $success_msg = $error_msg = $product_msg = '';

    // if (isset($_SESSION['logged']) && ($_SESSION['logged'] === true))
    if (empty($action))
    {
      $error_msg = 'Failed to perform requested action <br>';
      header("Location:/$url?alert=danger&info=$error_msg");
      return;
    }
    else
    {
      if (empty($_POST['user-id']))
      {
        $error = TRUE;
        $error_msg .= 'User id cannot be empty <br>';
      }
      elseif ((new ActionsModel)->user_exists($_POST['user-id']) === FALSE)
      {
        $error = TRUE;
        $error_msg .= 'You need to sign up to perform this action <br>';
      }
      else
      {
        $user_id = filter_var($_POST['user-id'], FILTER_SANITIZE_STRING);
      }

      if ($error === FALSE)
      {
        echo 'valid user <br>';

        if (empty($_POST['product-name']))
        {
          $error = TRUE;
          $error_msg .= 'Name cannot be empty <br>';
        }
        elseif (strlen($_POST['product-name']) < 10)
        {
          $error = TRUE;
          $error_msg .= 'Name must contain more than 10 characters <br>';
        }
        else
        {
          $name = filter_var($_POST['product-name'], FILTER_SANITIZE_STRING);
        }

        if (empty($_POST['product-reference']))
        {
          $error = TRUE;
          $error_msg .= 'Reference cannot be empty <br>';
        }
        elseif (strlen($_POST['product-reference']) < 4)
        {
          $error = TRUE;
          $error_msg .= 'Reference must contain more than 4 characters <br>';
        }
        else
        {
          $reference = filter_var($_POST['product-reference'], FILTER_SANITIZE_STRING);
        }

        if (empty($_POST['product-category'][0]))
        {
          $error = TRUE;
          $error_msg .= 'Category cannot be empty <br>';
        }
        else
        {
          $category = filter_var($_POST['product-category'][0], FILTER_SANITIZE_STRING);
        }

        if (empty($_POST['product-price']))
        {
          $error = TRUE;
          $error_msg .= 'Price cannot be empty <br>';
        }
        else
        {
          $price = filter_var($_POST['product-price'], FILTER_SANITIZE_STRING);
        }

        date_default_timezone_set('Europe/Paris');

        if (empty($_POST['purchase-date']))
        {
          $error = TRUE;
          $error_msg .= 'Purchase date cannot be empty <br>';
        }
        else
        {
          $purchase_date = filter_var(date($_POST['purchase-date'] . ' H:i:s'), FILTER_SANITIZE_STRING);
        }

        if (empty($_POST['warranty-date']))
        {
          $error = TRUE;
          $error_msg .= 'Warranty date cannot be empty <br>';
        }
        elseif (($_POST['warranty-date'] . ' 00:00:00') <= $purchase_date)
        {
          $error = TRUE;
          $error_msg .= 'Warranty date cannot be the same as the purchase date <br>';
        }
        else
        {
          $warranty_date = filter_var(date($_POST['warranty-date'] . ' H:i:s'), FILTER_SANITIZE_STRING);
        }

        if (empty($_POST['purchase-place'][0]))
        {
          $error = TRUE;
          $error_msg .= 'Sale type cannot be empty <br>';
        }
        else
        {
          $place = filter_var($_POST['purchase-place'][0], FILTER_SANITIZE_STRING);
        }

        if (empty($_POST['place-address']))
        {
          $error = TRUE;
          $error_msg .= "Seller's address cannot be empty <br>";
        }
        elseif (strlen($_POST['place-address']) < 10)
        {
          $error = TRUE;
          $error_msg .= "Seller's address must contain more than 10 characters <br>";
        }
        else
        {
          $address = filter_var($_POST['place-address'], FILTER_SANITIZE_STRING);
        }

        if (empty($_POST['product-maintenance']))
        {
          $error = TRUE;
          $error_msg .= 'Maintenance advice cannot be empty <br>';
        }
        elseif (strlen($_POST['product-maintenance']) < 10)
        {
          $error = TRUE;
          $error_msg .= 'Maintenance advice must contain more than 10 characters <br>';
        }
        else
        {
          $maintenance = filter_var($_POST['product-maintenance'], FILTER_SANITIZE_STRING);
        }

        // check $_FILES bug
        $receipt = 'someOtherFile.png';

        $manual = filter_var($_POST['user-manual'], FILTER_SANITIZE_STRING);

        if ($action === 'create')
        {
          if ($error === FALSE)
          {
            (new ActionsModel)->create_product($name, $reference, $category, $price, $purchase_date, $warranty_date, $place, $address, $maintenance, $receipt, $manual, $user_id);

            $success_msg .= 'Product inserted! <br>';
            header("Location:/$url?alert=info&info=$success_msg");
            return;
          }
          else
          {
            echo $error_msg;
            return;
          }
        }
        else
        {
          $actions_model = new ActionsModel();

          if (empty($_POST['product-id']))
          {
            $product_id = FALSE;
            $product_msg .= 'Product id cannot be empty <br>';
          }
          elseif ($actions_model->product_exists($_POST['product-id']) === FALSE)
          {
            $product_id = FALSE;
            $product_msg .= "Product id doesn't exist <br>";
          }
          else
          {
            $product_id = TRUE;
            $id = filter_var($_POST['product-id'], FILTER_SANITIZE_STRING);
          }

          if ($product_id === TRUE)
          {
            if ($action === 'edit')
            {
              $actions_model->edit_product($id, $name, $reference, $category, $price, $purchase_date, $warranty_date, $place, $address, $maintenance, $receipt, $manual, $user_id);

              $success_msg .= 'Product edited! <br>';
              header("Location:/$url?alert=info&info=$success_msg");
              return;
            }
            elseif ($action === 'delete')
            {
              $actions_model->delete_product($id);
              $success_msg .= 'Product deleted <br>';
              header("Location:/$url?alert=success&info=$success_msg");
              return;
            }
          }
          else {
            header("Location:/$url?alert=danger&info=$error_msg");
            return;
          }
        }
      }
      else
      {
        header("Location:/$url?alert=info&info=$error_msg");
        return;
      }
    }
  }
}
