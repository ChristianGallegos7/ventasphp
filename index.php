<?php
//base de dat0s
require("conexion.php");
//sesion
session_start();
//datos del form del usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //consulta a la base de datos para ver si exite

    //consulta a la base de datos para ver si existe
    $query = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    //verificar si existe en la base de datos 
    if (mysqli_num_rows($result) == 1) {
        // Obtener el valor de id_tipo_usuarios
        $row = mysqli_fetch_assoc($result);
        $id_tipo_usuarios = $row['id_tipo_usuarios'];

        // Iniciar sesión y redirigir al usuario a la página correspondiente
        $_SESSION['username'] = $username;
        if ($id_tipo_usuarios == 2) {
            header('Location: admin/index.php');
        } else if ($id_tipo_usuarios == 3) {
            header('Location: secciones/local.php');
        } else {
            // Si el valor de id_tipo_usuarios es desconocido, mostrar un mensaje de error o redirigir a otra página
        }
    } else {
        // Si no se encontró un usuario, muestra un mensaje de error
        $error = 'Usuario o contraseña incorrectos';
    }
}

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

    <link rel="stylesheet" href="./css/index.css">
</head>

<body>


    <header>
        <!-- place navbar here -->
    </header>
    <main class="py-5">
        <div class="container container2 d-flex flex-column align-items-center justify-content-center">
            <div class="card p-4" style="min-width: 450px;">
                <h2 class="text-center">Iniciar sesión</h2>
                <form action="index.php" method="POST" id="loginForm">
                    <div class="form-group">
                        <label for="username" class="form-label">Usuario:</label>
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control mb-3" id="username" autofocus name="username" required>
                            <img src="./images/avatar.png" alt="avatar" class="avatar mb-3 mx-2" width="30px">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Contraseña:</label>
                        <div class="d-flex align-items-center">
                            <input type="password" class="form-control mb-3" id="password" name="password" required>
                            <img src="./images/lock.png" id="showPasswordBtn" alt="avatar" class="avatar mb-3 mx-2" width="30px">
                            <!-- <button type="button" id="showPasswordBtn">Mostrar</button> -->
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                </form>
                <p class="text-center mt-3">¿No tienes una cuenta? <a href="registro.php">Registrarse</a></p>
                <?php if (isset($error)) { ?>
                    <div id="alert" class="alert alert-danger mt-3">
                        <?php echo $error; ?>
                    </div>
                    <script>
                        //oculta la alerta
                        setTimeout(() => {
                            document.getElementById("alert").classList.add("d-none");
                        }, 2000);
                    </script>
                <?php } ?>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <script>
        const showPasswordBtn = document.getElementById("showPasswordBtn");
        const passwordInput = document.getElementById("password");

        showPasswordBtn.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordBtn.textContent = "Ocultar";
            } else {
                passwordInput.type = "password";
                showPasswordBtn.textContent = "Mostrar";
            }
        });
    </script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

</body>

</html>