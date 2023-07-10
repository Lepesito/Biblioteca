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
// Incluir archivo de conexión a la base de datos
require_once 'conexion.php';
$conexion=conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el nombre de usuario ingresado por el usuario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    // Buscar el usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE titulo = ? and correo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('ss', $nombre, $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Si el usuario existe en la base de datos
    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        $idUsuarios = $usuario['idUsuarios'];
        echo '<form id="formulario" action="password.php" method="POST">';
    echo '<input type="hidden" name="idUsuarios" value="'.$idUsuarios.'">';
    echo '</form>';
    echo '<script>document.getElementById("formulario").submit();</script>';
    
    }
    else {
        echo "<script>
                    Swal.fire({
                        title: 'Error',
                        text: 'Usuario y/o correo no existe',
                        icon: 'error',
                        timer: 1000,
                        showConfirmButton: false
                    }).then(() => window.location.href = 'recuperar.php');
              </script>";
    }
}
?>
