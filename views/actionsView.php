<?php
$title = 'Client Actions';
ob_start();
?>
<!-- INSERT PRODUCT -->
<div class="container border py-3 bg-light">
  <div class="d-flex justify-content-between">
    <a class="btn btn-md bg-info text-white" href="/">Home</a>
    <button id="actionTab" class="btn btn-md bg-success text-white" type="button">Edit</button>
  </div>
</div>
<div class="container border mt-3 bg-light">
  <div id="creationForm">
    <form method="POST" action="/">
      <h4 class="p-3 text-center font-weight-bold text-primary">Insert new product</h4>
      <div class="form-group">
        <input class="form-control" type="number" name="product-id" placeholder="id" required>
      </div>
      <div class="form-group">
        <input class="form-control" type="text" name="product-name" placeholder="name" required>
      </div>
      <div class="form-group">
        <input class="form-control" type="number" name="product-reference" placeholder="reference" required>
      </div>
      <div class="form-group">
        <select class="form-control" name="product-category[]" required>
          <option class="text-light">category</option>
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
        <input class="form-control" type="text" name="product-price" placeholder="price" required>
      </div>
      <div class="form-group">
        <input class="form-control" type="date" name="purchase-date" placeholder="date" required>
      </div>
      <div class="form-group">
        <input class="form-control" type="date" name="warranty-date" placeholder="warranty" required>
      </div>
      <div class="form-group">
        <select class="form-control" name="purchase-place[]" required>
          <option class="text-light">purchase type</option>
          <option value="Direct">Direct</option>
          <option value="Online">Online</option>
        </select>
      </div>
      <div class="form-group">
        <input class="form-control" type="text" name="place-adress" placeholder="adress" required>
      </div>
      <div class="form-group">
        <textarea class="form-control" name="product-maintenance" rows="2" cols="80" required>maintenance advice</textarea>
      </div>
      <div class="form-group">
        <input type="file" name="myfile" multiple>
      </div>
      <div class="form-group">
        <textarea class="form-control" name="user-manual" rows="2" cols="80">user manual</textarea>
      </div>
      <div class="form-group">
        <input class="form-control" type="hidden" name="user-id" value="1">
      </div>
      <div class="form-group text-center">
        <button class="btn btn-md px-5 bg-primary text-white" type="submit" name="create-product">Create</button>
      </div>
    </form>
  </div>
  <!-- EDIT PRODUCT -->
  <div id="editionForm" class="hidden">
    <form method="POST" action="/">
      <h4 class="p-3 text-center font-weight-bold text-primary">Edit product</h4>
      <div class="form-group text-center">
        <button class="btn btn-md mx-3 px-5 bg-success text-white" type="submit" name="edit-product">Edit</button>
        <button class="btn btn-md mx-3 px-5 bg-info text-white" type="submit" name="archive-product">Archive</button>
        <button class="btn btn-md mx-3 px-5 bg-danger text-white" type="submit" name="delete-product">Delete</button>
      </div>
    </form>
  </div>
</div>
<?php
$content = ob_get_clean();
require('template.php');
?>
