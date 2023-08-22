<style>
    .registro-message {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background-color: #008f39;
        color: white;
        text-align: center;
        padding: 10px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #333;
        font-weight: bold;
    }

    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: none;
        background-color: #F5F5F5;
        color: #333;
        border-radius: 3px;
    }

    option {
        color: #333;
    }

    /* Estilos adicionales para hacerlo más colorido */

    label {
        font-size: 18px;
    }

    select {
        font-size: 16px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    option:hover {
        background-color: #FFA500;
        color: #fff;
    }

    option:checked {
        background-color: #FFA500;
        color: #fff;
    }

    .cancelar {
        border: red 2px solid;
        padding: 7px;
        background-color: red;
        color: white;
        text-decoration: none;
    }

    .reg {
        margin-bottom: 10px;
    }
</style>
<?php
// Importa el archivo de conexión a la base de datos
require_once 'conexion.php';

// Verifica si se envió el formulario de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene los datos del formulario
    // $cedula = $_POST['cedula'];
    $nombre = $_POST['firstname'];
    // $apellido = $_POST['lastname'];
    $contrasena = $_POST['password'];
    // $direccion = $_POST['address'];
    // $correo = $_POST['email'];
    // $telefono = $_POST['phone'];
    // $fecha_nacimiento = $_POST['birthdate'];
    $id_tipo_usuarios = $_POST['id_tipo_usuarios'];
    // Prepara la sentencia SQL para insertar los datos del cliente
    $stmt = $conn->prepare('INSERT INTO usuarios (username, password, id_tipo_usuarios) VALUES (?, ?, ?)');

    // Verifica si la preparación de la sentencia SQL fue exitosa
    if ($stmt === false) {
        die('Error al preparar la sentencia SQL: ' . $conn->error);
    }

    // Vincula los parámetros con los valores del cliente
    $stmt->bind_param('sss', $nombre,  $contrasena,  $id_tipo_usuarios);

    // Ejecuta la sentencia SQL con los datos del cliente
    if ($stmt->execute() === false) {
        die('Error al ejecutar la sentencia SQL: ' . $stmt->error);
    }
    echo '<div class="registro-message">Registro realizado con éxito</div>';
    // Redirige al usuario a la página de éxito
    echo <<<EOD
    <script>
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 1500);
    </script>
    EOD;
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Registro</title>
    <link rel="stylesheet" href="reg.css">

</head>

<body>
    <div class="container">
        <h2>Registro</h2>

        <form action="registro.php" method="POST">
            <!-- <label for="cedula">Cédula:</label>
            <input type="text" id="cedula" name="cedula" required> -->

            <label for="firstname">Nombre:</label>
            <input type="text" id="firstname" name="firstname" required>

            <!-- <label for="lastname">Apellido:</label>
            <input type="text" id="lastname" name="lastname" required> -->


            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <!-- <label for="address">Dirección:</label>
            <input type="text" id="address" name="address" required>

            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Teléfono:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="birthdate">Fecha de Nacimiento:</label>
            <input type="date" id="birthdate" name="birthdate" required> -->

            <label for="id_tipo_usuario">Tipo de usuario:</label>
            <select name="id_tipo_usuarios" id="id_tipo_usuarios" class="form-control">
                <?php
                require_once 'conexion.php';

                // Ejecutar la consulta para obtener los registros de la tabla tipo_usuarios
                $resultado = mysqli_query($conn, "SELECT * FROM tipo_usuarios");

                // Recorrer los resultados y mostrarlos en el select
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo '<option value="' . $fila['id_tipo_usuarios'] . '">' . $fila['Tipo'] . '</option>';
                }

                // Cerrar la conexión a la base de datos
                mysqli_close($conn);
                ?>

            </select>

            <input type="submit" value="Registrarse" class="reg">
            <a name="" id="" class="cancelar" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
</body>

</html>