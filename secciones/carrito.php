<?php
require("../conexion.php");
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Start the session
    session_start();

    // Retrieve the product information from the form data
    $id_producto = isset($_POST['id_producto']) ? $_POST['id_producto'] : null;
    $cantidad = isset($_POST['cantidad']) ? intval($_POST['cantidad']) : null;
    $precio = isset($_POST['precio']) ? intval($_POST['precio']) : null;

    // Add the product to the shopping cart (you can store the cart in a session or database)
    // Example:
    $_SESSION['cart'][] = [
        'id_producto' => $id_producto,
        'cantidad' => $cantidad,
        'precio' => $precio
    ];

    // Verificar si el producto ya existe en el carrito
    if (isset($_SESSION['carrito'][$id_producto])) {
        // Actualizar la cantidad del producto en el carrito
        $_SESSION['carrito'][$id_producto]['cantidad'] += $cantidad;
    } else {
        // Agregar el producto al carrito
        $_SESSION['carrito'][$id_producto] = array(
            'nombre' => $nombre,
            'precio' => $precio,
            'cantidad' => $cantidad
        );
    }
}
$conn->close();
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
                    <!-- Aquí se mostrarán los productos en el carrito -->
                    <?php
                    // Display the products in the shopping cart
                    // Example:
                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                        foreach ($_SESSION['cart'] as $item) {
                            echo '<tr>';
                            echo '<td>' . $item['id_producto'] . '</td>';
                            echo '<td>' . floatval($item['cantidad']) . '</td>';
                            echo '<td>' . floatval($item['precio']) . '</td>';
                            echo '<td>' . (floatval($item['cantidad']) * floatval($item['precio'])) . '</td>';

                            echo '<td>...</td>'; // Actions column
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <h4>Total: $<span id="cart-total">0</span></h4>
            </div>
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