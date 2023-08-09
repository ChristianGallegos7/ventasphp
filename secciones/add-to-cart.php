<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['productId']) && isset($_POST['cantidad']) && isset($_POST['precio']) && isset($_POST['nombre_producto'])) {
        echo "Datos recibidos correctamente."; // Mensaje de depuración

        // Convertir las cantidades y los precios a números
        $cantidad = intval($_POST['cantidad']);
        $precio = floatval($_POST['precio']);

        // Calcular el subtotal
        $subtotal = $cantidad * $precio;

        $producto = array(
            'id_producto' => $_POST['productId'],
            'cantidad' => $cantidad,
            'precio' => $precio,
            'nombre_producto' => $_POST['nombre_producto'],
            'subtotal' => $subtotal
        );

        // Agregar el producto a la sesión del carrito
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }
        $_SESSION['carrito'][] = $producto;

        echo 'Producto agregado al carrito';
    } else {
        echo 'Error al agregar el producto al carrito';
    }
} else {
    echo 'Acceso no válido';
}
