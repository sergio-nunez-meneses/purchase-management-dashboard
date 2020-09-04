<?php
$title = 'Client Actions';
ob_start();
?>
<!-- ERROR OVERLAY -->
<div id="errorContainer" class="hidden p-3">
  <div class="container border border-white mt-5 p-3">
    <h3 class="font-weight-bold text-white text-center">Sorry bro!:</h3>
    <p id="displayErrors" class="lead font-italic text-white text-center"></p>
  </div>
</div>
<!-- INSERT PRODUCT -->
<div class="container border py-3 bg-light">
  <div class="d-flex justify-content-between">
    <a class="btn btn-md bg-info text-white" href="/">Home</a>
    <button id="actionTab" class="btn btn-md bg-success text-white" type="button">Edit</button>
  </div>
</div>
<div class="container border mt-3 bg-light">
  <div id="createFormContainer">
    <form id="createForm" method="POST" action="/">
      <h4 class="p-3 text-center font-weight-bold text-primary">Insert new product</h4>
      <div class="form-group">
        <input class="form-control" type="number" name="product-id" placeholder="ID">
      </div>
      <div class="form-group">
        <input class="form-control" type="text" name="product-name" placeholder="Name">
      </div>
      <div class="form-group">
        <input class="form-control" type="number" name="product-reference" placeholder="Reference number">
      </div>
      <div class="form-group">
        <select class="form-control" name="product-category[]">
          <option class="text-light">Category</option>
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
          <option class="text-light">Sale type</option>
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
        <input type="file" multiple name="purchase-receipt[]">
      </div>
      <div class="form-group">
        <textarea class="form-control" name="user-manual" rows="2" cols="80">User manual: it' on the internet bro!</textarea>
      </div>
      <div class="form-group">
        <input class="form-control" type="number" name="user-id" value="1">
      </div>
      <div class="form-group text-center">
        <button class="btn btn-md px-5 bg-primary text-white" type="submit" name="create-product">Create</button>
      </div>
    </form>
  </div>
  <!-- EDIT PRODUCT -->
  <div id="editFormContainer" class="hidden">
    <form id="editForm" method="POST" action="/">
      <h4 class="p-3 text-center font-weight-bold text-primary">Edit product</h4>
      <div class="form-group">
        <input class="form-control" type="number" name="product-id" placeholder="ID">
      </div>
      <div class="form-group">
        <input class="form-control" type="text" name="product-name" placeholder="Name">
      </div>
      <div class="form-group">
        <input class="form-control" type="number" name="product-reference" placeholder="Reference number">
      </div>
      <div class="form-group">
        <select class="form-control" name="product-category[]">
          <option class="text-light">Category</option>
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
          <option class="text-light">Sale type</option>
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
        <input type="file" multiple name="purchase-receipt[]">
      </div>
      <div class="form-group">
        <textarea class="form-control" name="user-manual" rows="2" cols="80">User manual: it' on the internet bro!</textarea>
      </div>
      <div class="form-group">
        <input class="form-control" type="number" name="user-id" value="1">
      </div>
      <div class="form-group text-center">
        <button class="btn btn-md mx-3 px-5 bg-success text-white" type="submit" name="edit-product">Edit</button>
        <!-- <button class="btn btn-md mx-3 px-5 bg-info text-white" type="submit" name="archive-product">Archive</button> -->
        <button class="btn btn-md mx-3 px-5 bg-danger text-white" type="submit" name="delete-product">Delete</button>
      </div>
    </form>
  </div>
</div>
<?php
$content = ob_get_clean();
require('template.php');
?>
