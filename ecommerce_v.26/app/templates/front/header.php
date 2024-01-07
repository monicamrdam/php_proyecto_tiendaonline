<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Discolandia tienda de discos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../resources/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>

  <header>

    <!--Nav-bar -->
    <nav class="navbar navbar-expand-sm bg-dark border-bottom border-body" data-bs-theme="dark">
      <div class="container-fluid">

        <!--Icon-->
        <a class="navbar-brand" href="#">
          <img src="../resources/img/logo_discos.jpg" alt="Bootstrap" width=" 50" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <!--Main menu-->
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="landingpage.php">Discolandia</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="catalog.php">Catálogo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="contact.php">Contacto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="merchandising.php">Merchandising</a>
            </li>

          </ul>
          <!--Admin and cart -->

          <ul class="nav navbar-nav pull-right">
            <li class="nav-item " pull-right>
              <a class="nav-link active" href="checkout.php" class="btn"><i class="bi bi-cart"></i></span></a>
            </li>
            <li class="nav-item " pull-right>
              <a class="nav-link active" href="login.php" class="btn">Admin</span></a>
            </li>

          </ul>

        </div>
      </div>

    </nav>
  </header>