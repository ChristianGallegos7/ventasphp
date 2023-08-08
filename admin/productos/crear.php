<?php
require_once("../../conexion.php");

// Selección de los registros de la tabla "local"
$query = "SELECT id_local, Nombre FROM local";
$resultado = mysqli_query($conn, $query);
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
        <h1 class="text-center">Formulario de producto</h1>
        <div class="container card mt-5">
            <form action="procesar_formulario.php" method="POST" enctype="multipart/form-data" class="p-3">
                <!-- <div class="form-group">
                    <label for="id_producto">ID del producto:</label>
                    <input type="text" class="form-control mb-3" id="id_producto" name="id_producto">
                </div> -->

                <div class="form-group">
                    <label for="nombre_producto">Nombre del producto:</label>
                    <input type="text" class="form-control mb-3" id="nombre_producto" name="nombre_producto" required>
                </div>

                <div class="form-group">
                    <label for="descripcion_producto">Descripción del producto:</label>
                    <textarea class="form-control mb-3" id="descripcion_producto" name="descripcion_producto" required></textarea>
                </div>

                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number" class="form-control mb-3" id="stock" min="1" value="1" name="stock" oninput="this.value = this.value.replace(/-/g, '')" required>
                </div>

                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="text" class="form-control mb-3" id="precio" name="precio" pattern="[0-9]+(\.[0-9]{1,2})?" oninput="this.value = this.value.replace(/-/g, '')" required>
                </div>

                <div class="form-group">
                    <label for="imagen">Imagen:</label>
                    <input type="file" class="form-control-file mb-3" id="imagen" name="imagen" required>
                </div>

                <div class="form-group mb-3">
                    <label for="id_local">ID del local:</label>
                    <select class="form-control" id="id_local" name="id_local">
                        <?php while ($fila = mysqli_fetch_array($resultado)) { ?>
                            <option value="<?php echo $fila['id_local']; ?>"><?php echo $fila['Nombre']; ?></option>
                        <?php } ?>
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Añadir producto</button>
                <a name="" id="" class="btn btn-primary" href="http://localhost/dashboard/trainer/admin/index.php" role="button">Cancelar</a>
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

    <script>
        const nombreProductoInput = document.getElementById('nombre_producto');
        nombreProductoInput.addEventListener('input', function() {
            const regex = /[0-9]/g;
            if (regex.test(this.value)) {
                this.value = this.value.replace(regex, '');
            }
        });

        const nombreProductoInput2 = document.getElementById('descripcion_producto');
        nombreProductoInput2.addEventListener('input', function() {
            const regex = /[0-9]/g;
            if (regex.test(this.value)) {
                this.value = this.value.replace(regex, '');
            }
        });
    </script>
</body>

</html>