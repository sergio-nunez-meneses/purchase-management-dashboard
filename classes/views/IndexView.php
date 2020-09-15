<?php

class IndexView
{

  public static function display_products($products, $products_expire_soon, $price)
  {
    $title = 'User Index';
    // Personnalisation du CCS propre à cette "view"
    $specialStyleCSS = '<link rel="stylesheet" type="text/css" href="public/CSS/list_Style.css">';
    $specialJS = '<script src="/public/JS/indexScript.js"></script>';

    ob_start()
    ?>
    <!-- LAST PRODUCTS -->
    <!-- <div class="vw-100 vh-100">
      <div class="bg-image w-100">
        <div class="container mt-3 py-3 px-5 bgc-transparent">
        </div>
      </div>
    </div> -->

    <div class="container-fluid text-center">
      <div class="row">
        <div class="offset-lg-2 col-lg-8 bgc-transparent">
          <!-- DISPLAY INFOS/ERRORS -->
          <?php
          if (($_SERVER['REQUEST_METHOD'] == 'GET') && (isset($_GET['alert']) === TRUE) && (isset($_GET['info']) === TRUE))
          {
            ?>
            <div class="container p-3">
              <div class="alert alert-<?php echo $_GET['alert']; ?> text-center" role="alert">
                <p class="lead"><?php echo $_GET['info']; ?></p>
              </div>
            </div>
            <?php
          }
          ?>
          <!-- DISPLAY INFOS WARRANTY -->
          <div class="my-5">
            <?php
            if ($products_expire_soon !== NULL)
            {
              foreach ($products_expire_soon as $value)
              {
                ?>
                <div class="alert alert-warning my-1 mx-5 text-center" role="alert">
                  ATTENTION : La garantie du produit <?php echo $value['name'] ?> (<?php echo $value['category'] ?>) acheté le <?php echo $value['purchase_date_fr'] ?> arrive à expiration le <?php echo $value['warranty_date_fr'] ?> !
                </div>
                <?php
              }
            }
            ?>
          </div>
          <?php
          if ($_GET['url'] === 'user_index')
          {
            ?>
            <!-- CLIENT GRAPH -->
            <canvas id="graph1" width="300" height="200"></canvas>
            <?php
          }
          ?>

          <h1 class="py-1 text-white">Your last purchases - Vos derniers achats</h1>
          <p>
            <button id="detail" class="btn" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
              <i class="far fa-eye">
                <span>Afficher les détails</span><span class="collapse" id="collapseExample1">Masquer les détails</span>
              </i>
            </button>
          </p>
          <div class="table-responsive text-center">
            <table class="table table-hover table-stripped table-sm">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Nom</th>
                  <th scope="col">
                    <div class="collapse" id="collapseExample1">Réf</div>
                  </th>
                  <th scope="col">Catégorie</th>
                  <th scope="col">Prix</th>
                  <th scope="col">Date d'achat</th>
                  <th scope="col">
                    <div class="collapse" id="collapseExample1">Fin de garantie</div>
                  </th>
                  <th scope="col">
                    <div class="collapse" id="collapseExample1">Lieu d'achat</div>
                  </th>
                  <th scope="col">
                    <div class="collapse" id="collapseExample1">Adress</div>
                  </th>
                  <th scope="col">
                    <div class="collapse" id="collapseExample1">Maintenance du produit</div></th>
                  <th scope="col">
                    <div class="collapse" id="collapseExample1">Reçu</div>
                  </th>
                  <th scope="col">Manuel de l'Utilisateur</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($products as $product)
                {
                  ?>
                  <!-- EDIT FORM -->
                  <form id="edit_last_products_<?php echo $product['id']; ?>" method="POST" action="/user_index"></form>
                  <!-- user id -->
                  <input form="edit_last_products_<?php echo $product['id']; ?>" type="hidden" name="user-id" value="<?php echo $_SESSION['id']; ?>">
                  <tr>
                    <!-- product id -->
                    <input form="edit_last_products_<?php echo $product['id']; ?>" type="hidden" name="product-id" value="<?php echo $product['id']; ?>">
                    <!-- product name -->
                    <td>
                      <a href="/edit&id=<?php echo $product['id']; ?>">
                        <p class="product-name-<?php echo $product['id']; ?> lead">
                          <?php echo substr($product['name'], 0, 20) . '...'; ?>
                        </p>
                      </a>
                      <input form="edit_last_products_<?php echo $product['id']; ?>" class="hidden form-control" type="text" name="product-name<?php echo '-' . $product['id']; ?>" value="<?php echo $product['name']; ?>">
                    </td>
                    <!-- product reference -->
                    <td>
                      <div class="collapse" id="collapseExample1">
                        <p class="product-reference-<?php echo $product['id']; ?> lead">
                          <?php echo $product['reference']; ?>
                        </p>
                        <input form="edit_last_products_<?php echo $product['id']; ?>" class="hidden form-control" type="text" name="product-reference<?php echo '-' . $product['id']; ?>" value="<?php echo $product['reference']; ?>">
                      </div>
                    </td>
                    <!-- product category -->
                    <td>
                      <p class="product-category-<?php echo $product['id']; ?> lead">
                        <?php echo $product['category']; ?>
                      </p>
                      <select form="edit_last_products_<?php echo $product['id']; ?>" class="hidden form-control" name="product-category<?php echo '-' . $product['id']; ?>[]" required>
                        <option value="<?php echo $product['category']; ?>"><?php echo $product['category']; ?></option>
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
                    </td>
                    <!-- product price -->
                    <td>
                      <p class="product-price-<?php echo $product['id']; ?> lead">
                        <?php echo round($product['price'], 2); ?>€
                      </p>
                      <input form="edit_last_products_<?php echo $product['id']; ?>" class="hidden form-control" type="text" name="product-price<?php echo '-' . $product['id']; ?>" value="<?php echo $product['price']; ?>">
                    </td>
                    <!-- purchase date -->
                    <td>
                      <p class="purchase-date-<?php echo $product['id']; ?> lead">
                        <?php echo date('jS F, Y', strtotime($product['purchase_date'])); ?>
                      </p>
                      <input form="edit_last_products_<?php echo $product['id']; ?>" class="hidden form-control" type="date" name="purchase-date<?php echo '-' . $product['id']; ?>" value="">
                    </td>
                    <!-- warranty date -->
                    <td>
                      <div class="collapse" id="collapseExample1">
                        <p class="warranty-date-<?php echo $product['id']; ?> lead">
                          <?php echo date('jS F, Y', strtotime($product['warranty_date'])); ?>
                        </p>
                        <input form="edit_last_products_<?php echo $product['id']; ?>" class="hidden form-control" type="date" name="warranty-date<?php echo '-' . $product['id']; ?>" value="<?php echo $product['warranty_date']; ?>">
                      </div>
                    </td>
                    <!-- purchase place -->
                    <td>
                      <div class="collapse" id="collapseExample1">
                        <p class="purchase-place-<?php echo $product['id']; ?> lead">
                          <?php echo $product['purchase_place']; ?>
                        </p>
                        <select form="edit_last_products_<?php echo $product['id']; ?>" class="hidden form-control" name="purchase-place<?php echo '-' . $product['id']; ?>[]" required>
                          <option value="<?php echo $product['purchase_place']; ?>"><?php echo $product['purchase_place']; ?></option>
                          <option value="Direct">Direct</option>
                          <option value="Online">Online</option>
                        </select>
                      </div>
                    </td>
                    <!-- place address -->
                    <td>
                      <div class="collapse" id="collapseExample1">
                        <p class="place-address-<?php echo $product['id']; ?> lead">
                          <?php echo $product['place_address']; ?>
                        </p>
                        <input form="edit_last_products_<?php echo $product['id']; ?>" class="hidden form-control" type="text" name="place-address<?php echo '-' . $product['id']; ?>" value="<?php echo $product['place_address']; ?>">
                      </div>
                    </td>
                    <!-- product maintenance -->
                    <td>
                      <div class="scroll">
                        <div class="collapse" id="collapseExample1">
                          <p class="product-maintenance-<?php echo $product['id']; ?> lead">
                            <?php echo $product['product_maintenance']; ?>
                          </p>
                          <input form="edit_last_products_<?php echo $product['id']; ?>" class="hidden form-control" type="text" name="product-maintenance<?php echo '-' . $product['id']; ?>" value="<?php echo $product['product_maintenance']; ?>">
                        </div>
                      </div>
                    </td>
                    <!-- product receipt -->
                    <td>
                      <div class="collapse" id="collapseExample1">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          <i class="far fa-images"></i>
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Image</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <img class="purchase-receipt-<?php echo $product['id']; ?> mw-100" src="/public/<?php echo $product['purchase_receipt']; ?>">
                                <input form="edit_last_products_<?php echo $product['id']; ?>" class="hidden form-control" type="file" multiple name="purchase-receipt<?php echo '-' . $product['id']; ?>[]">
                                <input form="edit_last_products_<?php echo $product['id']; ?>" type="hidden" name="stored-receipt<?php echo '-' . $product['id']; ?>" value="<?php echo $product['purchase_receipt']; ?>">
                              </div>
                              <div class="modal-footer">
                                <a class="btn btn-primary" href="public/<?php echo $product['purchase_receipt']; ?>" role="button" download="receipt">
                                  Télécharger
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <!-- user manual -->
                    <td>
                      <div class="scroll">
                        <p class="user-manual-<?php echo $product['id']; ?> lead">
                          <?php echo $product['user_manual']; ?>
                        </p>
                        <input form="edit_last_products_<?php echo $product['id']; ?>" class="hidden form-control" type="text" name="user-manual<?php echo '-' . $product['id']; ?>" value="<?php echo $product['user_manual']; ?>">
                      </div>
                    </td>
                    <td>
                      <div class="d-flex flex-column">
                        <button form="edit_last_products_<?php echo $product['id']; ?>" class="btn btn-primary my-1" type="button" name="edit-btn">
                          <i class="fa fa-pencil"></i>
                        </button>
                        <button form="edit_last_products_<?php echo $product['id']; ?>" class="btn btn-danger my-1" type="submit" name="delete-btn">
                          <i class="fa fa-trash-o"></i>
                        </button>
                        <button form="edit_last_products_<?php echo $product['id']; ?>" class="hidden btn btn-success my-1" type="submit" name="submit-btn">
                          <i class="fa fa-exclamation"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>


        </div>
      </div>
    </div>


    <?php
    $content = ob_get_clean();
    require('templates/user_template.php');
  }
}
?>
