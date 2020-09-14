<?php
$title = 'Index MVC';
// Personnalisation du CCS propre à cette "view"
$specialStyleCSS = '<link rel="stylesheet" type="text/css" href="public/CSS/list_Style.css">';
$specialJS = null;

ob_start();
?>



<nav class=" navbar navbar-dark bg-dark navbar-expand-lg container-fluid" >
  <a class="navbar-brand" href="#">SPY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link margin-left-100" href="index.php"><i class="fas fa-plus"></i></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fas fa-list"></i></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/"><i class="fas fa-sign-out-alt"></i></a>
      </li>
    </ul>
  </div>
</nav>


<div class="container-fluid text-center">
  <div class="row">
    <div class="col-2">

    </div>

    <div class="col-8 back ">

      <div id="carouselExampleSlidesOnly" class="carousel slide container-fluid" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="public\img\graph.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
      </div>




      <h1 class="titre">Dernier achat</h1>
      <div class="">


        <table class="table table-active">
          <thead class="thead-dark">
            <tr>
              <th scope="col"><p>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
                  <i class="far fa-eye"></i>
                </button>
              </p>Nom</th>
              <th scope="col"><div class="collapse" id="collapseExample1">Réf</div></th>
              <th scope="col">Catégorie</th>
              <th scope="col">Prix</th>
              <th scope="col">Date d'achat</th>
              <th scope="col"><div class="collapse" id="collapseExample1">Fin de garantie</div></th>
              <th scope="col"><div class="collapse" id="collapseExample1">Lieu d'achat</div></th>
              <th scope="col"><div class="collapse" id="collapseExample1">Maintenance du produit</div></th>
              <th scope="col"><div class="collapse" id="collapseExample1">Reçu</div></th>
              <th scope="col">Manuel de l'Utilisateur</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($last_products as $product) {
              ?>
              <tr>
            <tr>
              <td><?php echo $product['name']?></td>
              <td><div class="collapse" id="collapseExample1"><?php echo $product['reference']?></div></td>
              <td><?php echo $product['category']?></td>
              <td><?php echo $product['price']?>€</td>
              <td>

            <?php

            // $vieux_timestamp = mktime('purchase_date');
            // echo 'l' . $vieux_timestamp;

            echo $product['purchase_date']

            ?>

</td>
              <td><div class="collapse" id="collapseExample1"><?php echo $product['warranty_date']?></div></td>
              <td><div class="collapse" id="collapseExample1"><?php echo $product['purchase_place']?></div></td>
              <td><div class="scroll"><div class="collapse" id="collapseExample1"><?php echo $product['product_maintenance']?></div></div></td>
              <td><div class="collapse" id="collapseExample1">

                <!-- <?php //echo $product['purchase_receipt']?> -->

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
                        <a class="btn btn-primary"  href="public/<?php echo $product['purchase_receipt']; ?>" role="button" download="receipt">Télécharger</i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td><div class="scroll"><?php echo $product['user_manual']?></div></td>
            <td><div class="d-flex flex-column">
              <button type="button" class="btn btn-primary my-1"><i class="fa fa-pencil"></i></i></button>
              <button type="button" class="btn btn-danger my-1"><i class="fa fa-trash-o"></i></button>
            </div></td>
          </tr>
          <?php
        }
        ?>
        </tbody>
      </table>
    </div>

    <h1 class="titre">Liste d'achat</h1>
    <table class="table table-active">
      <thead class="thead-dark">
        <tr>
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
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($products as $row) {
          ?>
          <tr>
            <td><?php echo $row['name']?></td>
            <td><div class="collapse" id="collapseExample"><?php echo $row['reference']?></div></td>
            <td><?php echo $row['category']?></td>
            <td><?php echo $row['price']?>€</td>
            <td><?php echo $row['purchase_date']?></td>
            <td><div class="collapse" id="collapseExample"><?php echo $row['warranty_date']?></div></td>
            <td><div class="collapse" id="collapseExample"><?php echo $row['purchase_place']?></div></td>
            <td><div class="scroll"><div class="collapse" id="collapseExample"><?php echo $row['product_maintenance']?></div></div></td>
            <td><div class="collapse" id="collapseExample">

              <!-- <?php //echo $row['purchase_receipt']?> -->

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
                      <img class="mw-100" src="public/<?php echo $row['purchase_receipt']; ?>" alt="">
                    </div>
                    <div class="modal-footer">
                      <a class="btn btn-primary"  href="public/<?php echo $row['purchase_receipt']; ?>" role="button" download="receipt">Télécharger</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td><div class="scroll"><?php echo $row['user_manual']?></div></td>
          <td><div class="d-flex flex-column">
            <button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i></i></button>
            <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
          </div></td>
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
require('template.php');
?>
