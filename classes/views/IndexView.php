<?php

class IndexView
{

  public static function display_expire_soon_products($products_expire_soon)
  {
    $title = 'Test Poil';
    // Personnalisation du CCS propre à cette "view"
    $specialStyleCSS = null;
    $specialJS = null;
    ob_start();

    foreach ($products_expire_soon as $value) {
      ?>
      <div class="alert alert-warning mx-5" role="alert">ATTENTION : La garantie du produit <?php echo $value['name'] ?> (<?php echo $value['category'] ?>) acheté le <?php echo $value['purchase_date_fr'] ?> arrive à expiration le <?php echo $value['warranty_date_fr'] ?>.</div>';

      <?php
    }
    $content = ob_get_clean();
    require('views/user_template.php');
  }


  public static function display_last_products($last_products)
  {
    $title = 'Index MVC';
    // Personnalisation du CCS propre à cette "view"
    $specialStyleCSS = '<link rel="stylesheet" type="text/css" href="public/CSS/list_Style.css">';
    $specialJS = null;

    ob_start()
    ?>
    <!-- LAST PRODUCTS -->
    <div class="container-fluid text-center">
      <div class="row">
        <div class="offset-lg-2 col-lg-8 back">

          <!-- PURCHASE GRAPH -->
          <h1 class="py-1 text-white">Some nonsense title</h1>
          <div id="carouselExampleSlidesOnly" class="carousel slide py-1" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="public\img\graph.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
          </div>

          <h1 class="titre">Derniers achats</h1>
          <div class="">
            <table class="table table-active">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">
                    <p>
                      <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
                        <i class="far fa-eye"></i>
                      </button>
                    </p>
                    Nom
                  </th>
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
                foreach ($last_products as $product) {
                  ?>
                  <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td>
                      <div class="collapse" id="collapseExample1">
                        <?php echo $product['reference']; ?>
                      </div>
                    </td>
                    <td><?php echo $product['category']; ?></td>
                    <td><?php echo $product['price']; ?>€</td>
                    <td><?php echo $product['purchase_date']; ?></td>
                    <td>
                      <div class="collapse" id="collapseExample1">
                        <?php echo $product['warranty_date']; ?>
                      </div>
                    </td>
                    <td>
                      <div class="collapse" id="collapseExample1">
                        <?php echo $product['purchase_place']; ?>
                      </div>
                    </td>
                    <td>
                      <div class="scroll">
                        <div class="collapse" id="collapseExample1">
                          <?php echo $product['product_maintenance']?>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="collapse" id="collapseExample1">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          <i class="far fa-images"></i>
                        </button>
                        <!-- Modal -->
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
                                <img class="mw-100" src="public/<?php echo $product['purchase_receipt']; ?>" alt="">
                              </div>
                              <div class="modal-footer">
                                <a class="btn btn-primary" href="public/<?php echo $product['purchase_receipt']; ?>" role="button" download="receipt">Télécharger</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="scroll">
                        <?php echo $product['user_manual']; ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex flex-column">
                        <button type="button" class="edit-btn btn btn-primary my-1">
                          <i class="fa fa-pencil"></i>
                        </button>
                        <button type="button" class="delete-btn btn btn-danger my-1">
                          <i class="fa fa-trash-o"></i>
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
    require('views/user_template.php');
  }

  public static function display_all_products($all_products)
  {
    $title = 'Index MVC';
    // Personnalisation du CCS propre à cette "view"
    $specialStyleCSS = '<link rel="stylesheet" type="text/css" href="public/CSS/list_Style.css">';
    $specialJS = null;

    ob_start()
    ?>
    <!-- ALL PRODUCTS LIST -->
    <form id="" method="POST" action="/"></form>
    <h1 class="titre">Liste d'achat</h1>
    <table class="table table-active">
      <thead class="thead-dark">
        <tr>
          <th scope="col"><p>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              <i class="far fa-eye"></i>
            </button>
          </p>Nom</th>
          <th scope="col"><div class="collapse" id="collapseExample">Réf</div></th>
          <th scope="col">Catégorie</th>
          <th scope="col">Prix</th>
          <th scope="col">Date d'achat</th>
          <th scope="col"><div class="collapse" id="collapseExample">Fin de garantie</div></th>
          <th scope="col"><div class="collapse" id="collapseExample">Lieu d'achat</div></th>
          <th scope="col"><div class="collapse" id="collapseExample">Maintenance du produit</div></th>
          <th scope="col"><div class="collapse" id="collapseExample">Reçu</div></th>
          <th scope="col">Manuel de l'Utilisateur</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($all_products as $row) {
          ?>
          <tr>
            <td><?php echo $row['name']?></td>
            <td>
              <div class="collapse" id="collapseExample">
                <?php echo $row['reference']; ?>
              </div>
            </td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['price']; ?>€</td>
            <td><?php echo $row['purchase_date']; ?></td>
            <td>
              <div class="collapse" id="collapseExample">
                <?php echo $row['warranty_date']; ?>
              </div>
            </td>
            <td>
              <div class="collapse" id="collapseExample">
                <?php echo $row['purchase_place']; ?>
              </div>
            </td>
            <td>
              <div class="scroll">
                <div class="collapse" id="collapseExample">
                  <?php echo $row['product_maintenance']; ?>
                </div>
              </div>
            </td>
            <td>
              <div class="collapse" id="collapseExample">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  <i class="far fa-images"></i>
                </button>
              </div>
              <!-- Modal -->
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
                      <img class="mw-100" src="public/<?php echo $row['purchase_receipt']; ?>" alt="">
                    </div>
                    <div class="modal-footer">
                      <a class="btn btn-primary"  href="public/<?php echo $row['purchase_receipt']; ?>" role="button" download="receipt">Télécharger</a>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <div class="scroll">
                <?php echo $row['user_manual']; ?>
              </div>
            </td>
            <td>
              <div class="d-flex flex-column">
                <button type="button" class="btn btn-primary">
                  <i class="fa fa-pencil"></i>
                </button>
                <button type="button" class="btn btn-danger">
                  <i class="fa fa-trash-o"></i>
                </button>
              </div>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
    <?php
    $content = ob_get_clean();
    require('views/user_template.php');
  }
}
?>
