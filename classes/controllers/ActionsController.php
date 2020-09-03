<?php

class ActionsController
{

  public static function actions_form()
  {
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
    // check $_FILES bug
    $error = false;
    $user_id = $success_msg = $error_msg = '';

    if (empty($action))
    {
      $error = true;
      $error_msg .= 'Failed to perform requested action.';
      echo $error_msg;
    } else
    {
      if (empty($_POST['product-name']))
      {
        $error = true;
        $error_msg .= 'Name cannot be empty';
      } elseif (strlen($_POST['product-name']) < 10)
      {
        $error = true;
        $error_msg .= 'Name must contain more than 10 characters';
      } else
      {
        $name = filter_var($_POST['product-name'], FILTER_SANITIZE_STRING);
      }

      if (empty($_POST['product-reference']))
      {
        $error = true;
        $error_msg .= 'Reference cannot be empty';
      } elseif (strlen($_POST['product-reference']) < 4)
      {
        $error = true;
        $error_msg .= 'Reference must contain more than 4 characters';
      } else
      {
        $reference = filter_var($_POST['product-reference'], FILTER_SANITIZE_STRING);
      }

      if (empty($_POST['product-category'][0]))
      {
        $error = true;
        $error_msg .= 'Category cannot be empty';
      } else
      {
        $category = filter_var($_POST['product-category'][0], FILTER_SANITIZE_STRING);
      }

      if (empty($_POST['product-price']))
      {
        $error = true;
        $error_msg .= 'Price cannot be empty';
      } else
      {
        $price = filter_var($_POST['product-price'], FILTER_SANITIZE_STRING);
      }

      date_default_timezone_set('Europe/Paris');
      $purchase_date = filter_var(substr(date("Y-m-d H:i:sa"), 0, -2), FILTER_SANITIZE_STRING);

      if (empty($_POST['warranty-date']))
      {
        $error = true;
        $error_msg .= 'Warranty date cannot be empty';
      } elseif (($_POST['warranty-date'] . ' 00:00:00') <= $purchase_date)
      {
        $error = true;
        $error_msg .= 'Warranty date cannot be the same as the purchase date';
      } else
      {
        $warranty_date = filter_var($_POST['warranty-date'] . ' 00:00:00', FILTER_SANITIZE_STRING);
      }

      if (empty($_POST['purchase-place'][0]))
      {
        $error = true;
        $error_msg .= 'Sale type cannot be empty';
      } else
      {
        $place = filter_var($_POST['purchase-place'][0], FILTER_SANITIZE_STRING);
      }

      if (empty($_POST['place-address']))
      {
        $error = true;
        $error_msg .= 'Seller\'s address cannot be empty';
      } elseif (strlen($_POST['place-address']) < 10)
      {
        $error = true;
        $error_msg .= 'Seller\'s address must contain more than 10 characters';
      } else
      {
        $address = filter_var($_POST['place-address'], FILTER_SANITIZE_STRING);
      }

      if (empty($_POST['product-maintenance']))
      {
        $error = true;
        $error_msg .= 'Maintenance advises cannot be empty';
      } elseif (strlen($_POST['product-maintenance']) < 10)
      {
        $error = true;
        $error_msg .= 'Maintenance advices must contain more than 10 characters';
      } else
      {
        $maintenance = filter_var($_POST['product-maintenance'], FILTER_SANITIZE_STRING);
      }

      $receipt = 'someFile.jpg';
      $manual = filter_var($_POST['user-manual'], FILTER_SANITIZE_STRING);

      if (empty($_POST['user-id']))
      {
        $error = true;
        $error_msg .= 'User ID cannot be empty';
      } elseif ((new ActionsModel())->user_exists($_POST['user-id']) === false)
      {
        $error = true;
        $error_msg .= 'User does not exist';
      } else
      {
        $user_id = filter_var($_POST['user-id'], FILTER_SANITIZE_STRING);
      }

      if ($error === false)
      {
        // sequence of conditions to check the action and call the corresponding method
        if ($action === 'create')
        {
          (new ActionsModel())->create_product($name, $reference, $category, $price, $purchase_date, $warranty_date, $place, $address, $maintenance, $receipt, $manual, $user_id);
          echo "$action<br>";
        }
      } else
      {
        echo "$error_msg<br>";
      }
    }
  }
}
