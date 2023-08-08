<?php
require_once("../../conexion.php");

// Verificar si el formulario ha sido enviado
if (!empty($_POST)) {
    // Obtener los datos del formulario
    $id_producto = mysqli_real_escape_string($conn, $_POST["id_producto"]);
    $nombre_producto = mysqli_real_escape_string($conn, $_POST["nombre_producto"]);
    $descripcion_producto = mysqli_real_escape_string($conn, $_POST["descripcion_producto"]);
    $stock = mysqli_real_escape_string($conn, $_POST["stock"]);
    $precio = mysqli_real_escape_string($conn, $_POST["precio"]);
    $local = mysqli_real_escape_string($conn, $_POST["local"]);

    // Actualizar los datos del producto en la base de datos
    $query = "UPDATE productos_local SET nombre_producto = '$nombre_producto', descripcion_producto = '$descripcion_producto', stock = $stock, precio = $precio, id_local = $local WHERE id_producto = $id_producto";
    mysqli_query($conn, $query);

    // Verificar si se ha seleccionado una nueva imagen para el producto
    if (!empty($_FILES["imagen"]["tmp_name"])) {
        // Procesar la imagen y actualizarla en la base de datos
        // ...
    }

    // Redirigir al usuario a la página de lista de productos
    header("Location: ../index.php");
    exit();
}

// Obtener el ID del producto de la URL
$id_producto = $_GET["id_producto"];

// Obtener los datos del producto de la base de datos
$query = "SELECT * FROM productos_local WHERE id_producto = $id_producto";
$resultado = mysqli_query($conn, $query);
$producto = mysqli_fetch_assoc($resultado);

// Obtener los registros de la tabla "local"
$query = "SELECT id_local, Nombre FROM local";
$resultado = mysqli_query($conn, $query);
?>

<!doctype html>
<html lang="en">

<head>
    <title>Editar producto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- place navbar here -->
        <!-- <div class="container"> -->
        <nav class="navbar navbar-expand navbar-light bg-light d-flex justify-content-between p-4 mx-3">
            <div>
                <img src="../images/avatar.png" alt="" width="50px">
            </div>
            <div class="nav navbar-nav">
                <a class="nav-item nav-link" href="http://localhost/dashboard/trainer/admin/index.php">Admin</a>
                <a class="nav-item nav-link" href="#"></a>
                <a class="nav-item nav-link active btn btn-success text-white" href="#" aria-current="page">Agregar productos <span class="visually-hidden">(current)</span></a>
            </div>
        </nav>
        <!-- </div> -->
    </header>
    <main>
        <h1 class="text-center">Editar producto</h1>
        <div class="container card mt-5">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_producto" value="<?php echo $producto["id_producto"]; ?>">
                <div class="form-group">
                    <label for="nombre_producto">Nombre:</label>
                    <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="<?php echo $producto["nombre_producto"]; ?>">
                </div>
                <div class="form-group">
                    <label for="descripcion_producto">Descripción:</label>
                    <textarea class="form-control" id="descripcion_producto" name="descripcion_producto"><?php echo $producto["descripcion_producto"]; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $producto["stock"]; ?>">
                </div>
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="number" step=".01" class="form-control" id="precio" name="precio" value="<?php echo $producto["precio"]; ?>">
                </div>
                <div class="form-group">
                    <label for="local">Local:</label>
                    <select class="form-control" id="local" name="local">
                        <?php while ($fila = mysqli_fetch_assoc($resultado)) : ?>
                            <?php if ($fila["id_local"] == $producto["id_local"]) : ?>
                                <option value="<?php echo $fila["id_local"]; ?>" selected><?php echo $fila["Nombre"]; ?></option>
                            <?php else : ?>
                                <option value="<?php echo $fila["id_local"]; ?>"><?php echo $fila["Nombre"]; ?></option>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen:</label>
                    <input type="file" class="form-control-file mb-3" id="imagen" name="imagen">
                    <?php if (!empty($producto["imagen"])) : ?>
                        <?php
                        $imagen_codificada = base64_encode($producto["imagen"]);
                        echo '<img src="data:image/jpeg;base64,' . $imagen_codificada . '" alt="' . '" width="100">';
                        ?>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Guardar cambios</button>

                <a name="" id="" class="btn btn-primary mt-3" href="http://localhost/dashboard/trainer/admin/index.php" role="button">Cancelar</a>
            </form>
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