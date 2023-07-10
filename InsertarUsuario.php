<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
    <title>Document</title>
</head>

<body style="height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(to bottom right, #00f9f9, #09efd1, #3eff61);">

</body>

</html>

<?php
include("conexion.php");
$con = conectar();
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if(isset($_POST['nombre']) && isset($_POST['password']) && isset($_POST['correo'])) {
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $correo = $_POST['correo'];
    $tipo = "usuario";

    // Verificar si el correo ya está registrado
    $query = "SELECT * FROM usuarios WHERE correo='$correo'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El correo ya está registrado',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'iniciosesion.php';
                });
            </script>";
    } else {
        // Verificar si el nombre ya está registrado
        $query2 = "SELECT * FROM usuarios WHERE Nombre='$nombre'";
        $result = mysqli_query($con, $query2);

        if(mysqli_num_rows($result) > 0) {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El nombre ya está registrado',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'iniciosesion.php';
                });
            </script>";
        } else {
            // Insertar nuevo usuario en la base de datos
            $query = "INSERT INTO usuarios (Nombre, Password, Tipo, correo) VALUES ('$nombre', '$hashed_password', '$tipo', '$correo')";
            if(mysqli_query($con, $query)) {
                echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: '¡Registro exitoso!',
                            text: 'Ya puedes iniciar sesión',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            window.location.href = 'iniciosesion.php';
                        });
                    </script>";
            } else {
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error al registrar el usuario',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            window.location.href = 'iniciosesion.php';
                        });
                    </script>";
            }
        }
    }
}

mysqli_close($con);
?>
