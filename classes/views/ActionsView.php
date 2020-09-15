<?php

class ActionsView
{

  public static function display($url)
  {
    if ($url === 'create_product')
    {
      $title = 'Insert product';
    }
    else
    {
      $title = 'Edit product';
    }

    // SET PAGE CSS AND JS
    $specialStyleCSS = '<link rel="stylesheet" href="/public/CSS/style.css">';
    $specialJS = '<script src="/public/JS/script.js"></script>';

    ob_start();
    ?>
    <div class="vh-100">
      <div class="">
        <!-- JS ERROR OVERLAY -->
        <!-- <div id="errorContainer" class="error-container hidden p-3">
          <div class="container border border-white mt-5 p-3">
            <h3 class="font-weight-bold text-white text-center">Sorry bro!:</h3>
            <p id="displayErrors" class="lead font-italic text-white text-center"></p>
          </div>
        </div> -->
        <!-- DISPLAY INFOS/ERRORS -->
        <?php
        if (($_SERVER['REQUEST_METHOD'] == 'GET') && (isset($_GET['alert']) === TRUE) && (isset($_GET['info']) === TRUE)) {
          ?>
          <div class="container pt-3">
            <div class="alert alert-<?php echo $_GET['alert']; ?> text-center" role="alert">
              <p class="lead"><?php echo $_GET['info']; ?></p>
            </div>
          </div>
          <?php
        }
        ?>
        <!-- <div class="container p-3 bgc-transparent">
          <div class="d-flex justify-content-between">
            <a class="logo btn btn-md bg-info text-white" href="/">Home</a>
            <button id="actionTab" class="btn btn-md bg-success text-white" type="button">Edit</button>
          </div>
        </div> -->
        <div class="container py-3 px-5 bgc-transparent">

          <?php
          if ($url === 'create_product')
          {
            ?>
            <!-- INSERT PRODUCT -->
            <div id="createFormContainer">
              <form id="createForm" method="POST" action="/create_product">
                <h1 class="m-0 text-center">Insert new product</h1>
                <h1 class="mb-1 text-center">Ajouter un nouveau produit</h1>
                <div class="form-group">
                  <input class="form-control" type="text" name="product-name" placeholder="Name" required>
                </div>
                <div class="form-group">
                  <input class="form-control" type="number" name="product-reference" placeholder="Reference number" required>
                </div>
                <div class="form-group">
                  <select class="form-control" name="product-category[]" required>
                    <option>Category</option>
                    <option value="Electroménager">Electroménager</option>
                    <option value="TV-HIFI">TV-HIFI</option>
                    <option value="Bricolage">Bricolage</option>
                    <option value="Voiture">Voiture</option>
                    <option value="Alimentation">Alimentation</option>
                    <option value="Jardinage">Jardinage</option>
                    <option value="Musique">Musique</option>
                    <option value="Scolaire">Scolaire</option>
                    <option value="Animaux">Animaux</option>
                  </select>
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" name="product-price" placeholder="Price" required>
                </div>
                <div class="form-group">
                  <input class="form-control" type="date" name="purchase-date" required>
                </div>
                <div class="form-group">
                  <input class="form-control" type="date" name="warranty-date" required>
                </div>
                <div class="form-group">
                  <select class="form-control" name="purchase-place[]" required>
                    <option>Sale type</option>
                    <option value="Direct">Direct</option>
                    <option value="Online">Online</option>
                  </select>
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" name="place-address" placeholder="Seller address" required>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="product-maintenance" rows="2" cols="80" required>Maintenance advice: nope, nothing else to say!</textarea>
                </div>
                <div class="form-group">
                  <input class="form-control" type="file" multiple name="purchase-receipt[]" required>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="user-manual" rows="2" cols="80">User manual: it's on the internet bro!</textarea>
                </div>
                <div class="form-group">
                  <input class="form-control" type="hidden" name="user-id" value="<?php echo $_SESSION['id'] ?>" required>
                </div>
                <div class="form-group text-center">
                  <button id="detail" class="btn btn-md px-5" type="submit" name="create-product">Create</button>
                </div>
              </form>
            </div>
            <?php
          }
          else
          {
            ?>
            <!-- EDIT PRODUCT -->
            <!-- <div id="editFormContainer">
              <form id="editForm" method="POST" action="/edit">
                <h4 class="p-3 font-weight-bold text-primary text-uppercase text-center">Edit product</h4>
                <div class="form-group">
                  <input class="form-control" type="number" name="product-id" placeholder="ID" required>
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" name="product-name" placeholder="Name">
                </div>
                <div class="form-group">
                  <input class="form-control" type="number" name="product-reference" placeholder="Reference number">
                </div>
                <div class="form-group">
                  <select class="form-control" name="product-category[]">
                    <option>Category</option>
                    <option value="Electroménager">Electroménager</option>
                    <option value="TV-HIFI">TV-HIFI</option>
                    <option value="Bricolage">Bricolage</option>
                    <option value="Voiture">Voiture</option>
                    <option value="Alimentation">Alimentation</option>
                    <option value="Jardinage">Jardinage</option>
                    <option value="Musique">Musique</option>
                    <option value="Scolaire">Scolaire</option>
                    <option value="Animaux">Animaux</option>
                  </select>
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" name="product-price" placeholder="Price">
                </div>
                <div class="form-group">
                  <input class="form-control" type="date" name="purchase-date">
                </div>
                <div class="form-group">
                  <input class="form-control" type="date" name="warranty-date">
                </div>
                <div class="form-group">
                  <select class="form-control" name="purchase-place[]">
                    <option>Sale type</option>
                    <option value="Direct">Direct</option>
                    <option value="Online">Online</option>
                  </select>
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" name="place-address" placeholder="Seller address">
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="product-maintenance" rows="2" cols="80">Maintenance advice: nope, nothing else to say!</textarea>
                </div>
                <div class="form-group">
                  <input type="hidden" name="stored_receipt" value="">
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" name="" placeholder="Here goes, hidden, the stored receipt image when editing">
                </div>
                <div class="form-group">
                  <input class="form-control" type="file" multiple name="purchase-receipt[]">
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="user-manual" rows="2" cols="80">User manual: it's on the internet bro!</textarea>
                </div>
                <div class="form-group">
                  <input class="form-control" type="number" name="user-id" value="1">
                </div>
                <div class="form-group text-center">
                  <button class="btn btn-md mx-3 px-5 bg-success text-white" type="submit" name="edit-product">Edit</button>
                  <button class="btn btn-md mx-3 px-5 bg-danger text-white" type="submit" name="delete-product">Delete</button>
                </div>
              </form>
            </div> -->
            <?php
          }
          ?>
        </div>
      </div>
    </div>
    <?php
    $content = ob_get_clean();
    require('templates/user_template.php');
  }
}
?>
