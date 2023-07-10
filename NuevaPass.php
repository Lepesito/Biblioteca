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

if (isset($_POST['idUsuarios']) && isset($_POST['password'])) {
    $id = $_POST['idUsuarios'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Actualizar contraseña del usuario en la base de datos
    $query = "UPDATE usuarios SET Password = ? WHERE idUsuarios = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('si', $hashed_password, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: '¡Contraseña actualizada!',
                    text: 'La contraseña ha sido actualizada correctamente',
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
                    text: 'Error al actualizar la contraseña',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'iniciosesion.php';
                });
            </script>";
    }
}

mysqli_close($con);
?>
