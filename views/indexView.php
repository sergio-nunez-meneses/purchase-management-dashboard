<?php
$title = 'Index MVC';
ob_start();
?>
<h1>Products list</h1>
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
      <?php
    }
    ?>
  </tbody>
</table>
<?php
$content = ob_get_clean();
require('template.php');
?>
