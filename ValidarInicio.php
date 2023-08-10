<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="Estilos/validar.css">
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
    background: linear-gradient(to bottom right, #ffcaa8, #d292e3, #65597f)">


</body>

</html>
<?php
    include("conexion.php");
    $conexion = conectar();
    $usuario = $_POST['Usuario'];
    $Password = $_POST['Password'];

    if (empty($usuario) || empty($Password)) {
        echo "<script>
                    Swal.fire({
                        title: 'Error',
                        text: 'Por favor ingrese su nombre de usuario y contraseña.',
                        icon: 'error',
                        timer: 1000,
                        showConfirmButton: false
                    }).then(() => window.location.href = 'iniciosesion.php');
              </script>";
        exit();
    }

    $query = "SELECT * FROM usuarios WHERE Nombre='$usuario'";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) == 1) {
        $fila = mysqli_fetch_assoc($result);

        if (password_verify($Password, $fila['password'])) {
            $_SESSION['tipo'] = $fila['Tipo'] == 'admin' ? 'admin' : 'usuario';
            echo "<script>
                        Swal.fire({
                            title: 'Bienvenido',
                            text: '¡Bienvenido " . $fila['Nombre'] . "!',
                            icon: 'success',
                            timer: 1000,
                            showConfirmButton: false
                        }).then(() => window.location.href = 'index.php');
                  </script>";
            exit();
        } else {
            echo "<script>
                        Swal.fire({
                            title: 'Error',
                            text: 'Contraseña incorrecta.',
                            icon: 'error',
                            timer: 1000,
                            showConfirmButton: false
                        }).then(() => window.location.href = 'iniciosesion.php');
                  </script>";
            exit();
        }
    } else {
        echo "<script>
                    Swal.fire({
                        title: 'Error',
                        text: 'No se encontró ningún usuario con ese nombre de usuario.',
                        icon: 'error',
                        timer: 1000,
                        showConfirmButton: false
                    }).then(() => window.location.href = 'iniciosesion.php');
              </script>";
        exit();
    }
?>
