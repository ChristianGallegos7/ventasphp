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
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container">
            <h1 class="text-center">Carrito de compras</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Precio total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="cart-items">
                    <?php
                    // Iniciar la sesión
                    session_start();

                    // Mostrar los productos del carrito
                    if (isset($_SESSION['carrito']) && is_array($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                        foreach ($_SESSION['carrito'] as $i => $producto) {
                            if (isset($producto['nombre_producto'])) {
                                $nombre_producto = $producto['nombre_producto'];
                            } else {
                                $nombre_producto = "No hay nombre";
                            }
                            if (isset($producto['cantidad']) && isset($producto['precio'])) {
                                $subtotal = 0;
                                if (is_array($producto['cantidad'])) {
                                    $subtotal = intval($producto['cantidad']) * intval($producto['precio']);
                                } else {
                                    $subtotal = $producto['cantidad'] * $producto['precio'];
                                }

                                // Check if 'nombre_producto' is set before accessing it
                                $nombre_producto = isset($producto['nombre_producto']) ? $producto['nombre_producto'] : 'No hay nombre';

                                echo '<tr>';
                                echo '<td>' . (string)$nombre_producto . '</td>';


                                // Convert 'cantidad' and 'precio' arrays to strings using 'implode()'
                                echo '<td>' . ((is_array($producto['cantidad'])) ? array_sum($producto['cantidad']) : $producto['cantidad']) . '</td>';

                                echo '<td>$' . (is_array($producto['precio']) ? implode(', ', $producto['precio']) : $producto['precio']) . '</td>';
                                echo '<td>$' . number_format($subtotal, 2) . '</td>';
                                echo '<td><button class="btn btn-danger">Eliminar</button></td>';
                                echo '</tr>';
                            }
                        }
                    } else {
                        echo '<tr><td colspan="5">El carrito está vacío.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>

            <!-- <div class="d-flex justify-content-end">
                <h4> Total: $<span id="cart-total"><?php echo number_format($total, 2); ?></span></h4>
            </div> -->
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