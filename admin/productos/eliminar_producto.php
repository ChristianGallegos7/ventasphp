<?php
require_once("../../conexion.php");

if (isset($_POST["id_producto"])) {
    $id_producto = $_POST["id_producto"];

    $query = "DELETE FROM productos_local WHERE id_producto = '$id_producto'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Producto eliminado correctamente";
    } else {
        echo "Error al eliminar el producto";
    }
} else {
    echo "No se ha recibido el ID del producto";
}
