    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
require('include/auto_class_loader.php');
echo "<h1>Selection de tous les produits</h1>";

$db = new Database();
$products = $db->run_query('SELECT * FROM products');
$products = $products->fetchAll();

foreach ($products as $row) {
  echo $row['id'] . '<br>';
  echo $row['name'] . '<br>';
  echo $row['price'] . '<br> <hr>';
}
echo "<h1>Selection de tous les produits par utilisateur</h1>";

$db = new Database();
$products = $db->run_query('SELECT * FROM products WHERE users_id = 1');
$products = $products->fetchAll();
?>

<table class="table table-active">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">reference</th>
      <th scope="col">category</th>
      <th scope="col">price</th>
      <th scope="col">purchase date</th>
      <th scope="col">warranty date</th>
      <th scope="col">purchase place</th>
      <th scope="col">product maintenance</th>
      <th scope="col">purchase receipt</th>
      <th scope="col">user manual</th>
      <th scope="col">user id</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach ($products as $row) {
   ?>
    <tr>
      <th scope="row"><?php echo $row['id']?></th>
      <td><?php echo $row['name']?></td>
      <td><?php echo $row['reference']?></td>
      <td><?php echo $row['category']?></td>
      <td><?php echo $row['price']?></td>
      <td><?php echo $row['purchase_date']?></td>
      <td><?php echo $row['warranty_date']?></td>
      <td><?php echo $row['purchase_place']?></td>
      <td><?php echo $row['product_maintenance']?></td>
      <td><?php echo $row['purchase_receipt']?></td>
      <td><?php echo $row['user_manual']?></td>
      <td><?php echo $row['users_id']?></td>
    </tr>
<?php } ?>

  </tbody>
</table>
