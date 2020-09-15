<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sergio NUNEZ MENESES - Philippe PERECHODOV - Yacine SBAI">
    <title><?php echo $title; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Fontawsome -->
    <script src="https://kit.fontawesome.com/fbdd9c8340.js" crossorigin="anonymous"></script>
    <!-- Style CSS -->
    <?php echo $specialStyleCSS; ?>
  </head>

  <body>

    <header>
      <!-- NAVBAR -->
      <div class="">
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
          <a class="navbar-brand" href="/user_index">SPY</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div id="navbarNav" class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <?php
              if ($_GET['url'] !== 'create_product') {
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="/create_product"><i class="fas fa-plus mx-1"></i>Insert</a>
                </li>
                <?php
              }
              ?>
              <?php
              if ($_GET['url'] !== 'edit_product') {
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="/edit_product"><i class="fas fa-list mx-1"></i>See all</a>
                </li>
                <?php
              }
              ?>
              <li class="nav-item">
                <a class="nav-link" href="/&logout=yes"><i class="fas fa-sign-out-alt mx-1"></i>Sign out</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <main>
      <?php echo $content; ?>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="/public/JS/functionsDOM.js"></script>
    <?php echo $specialJS; ?>
  </body>
</html>
