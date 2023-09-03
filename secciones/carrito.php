<?php
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light  p-3">
            <div class="container-fluid">
                <h1><a class="navbar-brand titulo" href="#">CARRITO</a></h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="d-flex align-items-center justify-content-center mx-auto">
                    <a href="carrito.php" class="nav-link carrito"> <img src="../images/carrito.png" alt="CARRITO DE COMPRAS" width="30px" title="Click para ver carrito de compras"> </a>
                </div>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">

                        <!-- <li class="nav-item">
                            <a class="nav-link titulo2" aria-current="page" href="local.php">Inicio</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link titulo2" href="local.php">Regresar a locales🏪</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <h1 class="text-center">Carrito de compras</h1>
            <table class="table">
                <thead>
                    <tr>
                        <!-- <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Precio total</th>
                        <th>Acciones</th> -->
                    </tr>
                </thead>
                <tbody id="cart-items">
                    <?php
                    session_start();
                    // var_dump($_SESSION['carrito']); // Muestra el contenido del carrito

                    if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
                        echo "<p>El carrito está vacío.</p>";
                    } else {
                        echo '<tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>';
                        // var_dump($_SESSION['carrito']);

                        foreach ($_SESSION['carrito'] as $producto) {
                            $subtotal = $producto['cantidad'] * $producto['precio'];
                            echo "<tr>
                <td>{$producto['nombre_producto']}</td>
                <td>{$producto['cantidad']}</td>
                <td>$" . number_format($producto['precio'], 2) . "</td>
                <td>$" . number_format($subtotal, 2) . "</td>
            </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>

            <!-- <div class="d-flex justify-content-end">
                <h4> Total: $<span id="cart-total"><?php echo number_format($total, 2); ?></span></h4>
            </div> -->
            <a name="pagar" id="pagar" class="btn btn-primary" href="#" role="button">PAGAR</a>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>