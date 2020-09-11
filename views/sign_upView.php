<div id="sidenavCreateAccount" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <div id="sidenavLogo">
    <img src="public/images/logo.png" class="responsive-img">
  </div>

  <p class="instructions">Création d'un nouveau compte</p>

  <form class="" action="index.php?user=sign_up" method="post">

    <div class="field input-group input-group-lg">
      <div class="input-group-prepend">
        <span id="spanCreateLogin" class="input-group-text"><i class="fas fa-user"></i></span>
      </div>
      <input id="user_CreateLogin" name="user_CreateLogin" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required placeholder="Identifiant" value="<?php if (isset($_POST['user_CreateLogin'])) {echo htmlspecialchars($_POST['user_CreateLogin']);} ?>" pattern="[a-zA-ZÀ-ÿ' -]{1,}" autofocus >
    </div>

    <div class="field input-group input-group-lg">
      <div class="input-group-prepend">
        <span id="spanCreateMail" class="input-group-text"><i class="fas fa-at"></i></span>
      </div>
      <input id="user_CreateMail" name="user_CreateMail" type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required placeholder="Votre adresse email" value="<?php if (isset($_POST['user_CreateMail'])) {echo htmlspecialchars($_POST['user_CreateMail']);} ?>" pattern=".*@.*[.].*">
    </div>

    <div class="field input-group input-group-lg">
      <div class="input-group-prepend">
        <span id="spanCreatePassword" class="input-group-text"><i class="fas fa-lock"></i></span>
      </div>
      <input id="user_CreatePassword" name="user_CreatePassword" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required placeholder="Mot de passe">
    </div>

    <div class="field input-group input-group-lg">
      <div class="input-group-prepend">
        <span id="spanConfirmPassword" class="input-group-text"><i class="fas fa-key"></i></span>
      </div>
      <input id="user_ConfirmPassword" name="user_ConfirmPassword" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required placeholder="Confirmez le mot de passe">
    </div>

    <button type="submit" class="btn button-submit button_form px-4 py-3 mt-2" id="btn_valide_create">
      <span class="valid">Valider</span>
      <svg  class="arrow" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="20px" viewBox="0 0 15.465 26" enable-background="new 0 0 15.465 26" xml:space="preserve">
        <polygon fill="black" points="0,2.465 2.466,0 15.465,13.001 2.466,26 0,23.536 10.535,13.001 0,2.465 "/>
      </svg>
    </button>
    
  </form>

  <?php
  if (isset($_POST['infoCreate'])) {
    echo $_POST['infoCreate'];
  }
  ?>

</div>
