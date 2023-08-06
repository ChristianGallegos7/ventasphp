<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link rel="stylesheet" href="../css/local.css">
</head>

<body class="d-flex flex-column min-vh-100">
  <header>
    <nav class="navbar navbar-expand-lg p-2">
      <div class="container-fluid">
        <!-- Elementos a la izquierda -->
        <div class="navbar-nav me-auto">
          <a class="navbar-brand mx-auto" href="#">
            <img src="../images/hamburguesa.png" alt="Logo" height="50px">
          </a>
          <div class="d-flex align-items-center justify-content-center mx-auto">
            <a href="carrito.php" class="nav-link carrito"> <img src="../images/carrito.png" alt="CARRITO DE COMPRAS" width="30px" title="Click para ver carrito de compras"> </a>
          </div>
        </div>
        <!-- Logo en el centro -->

        <h1 class="d-inline-block titulo">FOODies🍜</h1>
        <!-- Elementos a la derecha -->
        <div class="navbar-nav ms-auto">
          <div class="dropdown">
            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              Opciones
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
              <li><a class="dropdown-item" href="../index.php">Cerrar Sesion🔙</a></li>
              <!-- <li><a class="dropdown-item" href="#">Elemento 5</a></li> -->
            </ul>
          </div>
        </div>
      </div>
    </nav>

  </header>
  <main>
    <div class="container my-5 text-center">
      <h2 class="mb-5">Elige tu local</h2>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-100 p-3">
            <img src="../images/kfc.jpg" class="card-img-top img" alt="Local 1" height="300px" width="150px">
            <div class="card-body">
              <h5 class="card-title">KFC</h5>
              <p class="card-text">El mejor pollo</p>
              <a href="kfc.php" class="btn btn-dark p-3">Ir a este local 🛒</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 p-3">
            <img src="../images/pinchos.jpg" class="card-img-top img" alt="Local 2" height="300px">
            <div class="card-body">
              <h5 class="card-title">Parrilladas</h5>
              <p class="card-text">Las mejores parrilladas</p>
              <a href="parrilladas.php" class="btn btn-dark p-3">Ir a este local 🛒</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 p-3">
            <img src="../images/bebidas.webp" class="card-img-top bebida" alt="Local 3">
            <div class="card-body">
              <h5 class="card-title">Bebidas</h5>
              <p class="card-text">Bebidas refrescantes</p>
              <a href="bebidas.php" class="btn btn-dark p-3">Ir a este local 🛒</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="mt-auto bg-light">
    <!-- place footer here -->
    <div class="container py-3 text-center">
      © FOODies🍜 2023
    </div>
  </footer>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>