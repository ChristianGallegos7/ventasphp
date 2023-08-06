<?php
session_start();

if (isset($_POST['id_producto']) && isset($_POST['cantidad'])) {
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];

    // Actualizar la cantidad de productos en el carrito en la sesión de PHP
    if ($cantidad > 0) {
        $_SESSION['carrito'][$id_producto]['cantidad'] = $cantidad;
    } else {
        unset($_SESSION['carrito'][$id_producto]);
    }

    // Devolver la tabla del carrito actualizada en formato HTML
    require("../conexion.php");
    $total = 0;
    foreach ($_SESSION['carrito'] as $id_producto => $producto) {
        $sql = "SELECT nombre_producto FROM productos_local WHERE id_producto = $id_producto";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $nombre_producto = $row['nombre_producto'];
        $precio_unitario = floatval($producto['precio']);
        $cantidad = intval($producto['cantidad']);
        $precio_total = $precio_unitario * $cantidad;
        $total += $precio_total;

        echo "<tr>";
        echo "<td>$nombre_producto</td>";
        echo "<td><button class=\"btn btn-sm btn-primary\" onclick=\"actualizarCarrito($id_producto, $cantidad - 1)\">-</button> $cantidad <button class=\"btn btn-sm btn-primary\" onclick=\"actualizarCarrito($id_producto, $cantidad + 1)\">+</button></td>";
        echo "<td>$precio_unitario</td>";
        echo "<td>$precio_total</td>";
        echo "</tr>";
    }
    echo "<tr><td colspan=\"3\" class=\"text-end\">Total:</td><td>$total</td></tr>";
}
