<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="../../css/productos.css">
</head>

<body>
    <header>
        <!-- place navbar here -->
        <nav class="navbar navbar-expand navbar-light bg-light d-flex justify-content-between p-4 mx-3">
            <div>
                <img src="../images/avatar.png" alt="" width="50px">
            </div>
            <div class="nav navbar-nav">
                <a class="nav-item nav-link" href="http://localhost/dashboard/trainer/admin/index.php">Admin</a>
                <a class="nav-item nav-link" href="#"></a>
                <!-- <a class="nav-item nav-link active btn btn-success text-white" href="#" aria-current="page">Agregar productos <span class="visually-hidden">(current)</span></a> -->
            </div>
        </nav>
    </header>
    <main class="contenido mt-5">
        <?php
        require_once("../../conexion.php");

        // Recibe los datos del formulario
        // $id_producto = $_POST['id_producto'];
        $nombre_local = $_POST['nombre_local'];
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));



        // Inserta los datos en la tabla "productos_local"
        $query = "INSERT INTO local (Nombre, imagen) VALUES ('$nombre_local', '$imagen')";

        $resultado = mysqli_query($conn, $query);

        // Verifica si se insertaron los datos correctamente
        if ($resultado) {
            echo '<div class="card p-3 tarjeta container d-flex justify-content-center align-items-center">';
            echo '<div class="alert alert-success w-50 mx-auto">' . "Local insertado correctamente" . '</div>';
            echo '<img src="../../images/giphy.gif" class="text-center justify-content-center" alt="" width="150px">';
            echo '<a name="" id="" class="btn btn-primary mt-3" href="http://localhost/dashboard/trainer/admin/index.php" role="button">VOLVER</a>';
            echo '</div>';
        } else {
            echo "Error al insertar el producto";
        }
        ?>

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