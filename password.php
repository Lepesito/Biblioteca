<?php

$id = $_POST['idUsuarios'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="Estilos/inicio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
</head>

<body>
    <form>
        <a href="recuperar.php"><span style="font-size: 70px; color: white;"
                class="material-symbols-outlined">arrow_back_ios</span></a>
    </form>
    <form action="NuevaPass.php" method="POST">
        <div class="container">
            <div class="design">
                <div class="pill-1 rotate-45"></div>
                <div class="pill-2 rotate-45"></div>
                <div class="pill-3 rotate-45"></div>
                <div class="pill-4 rotate-45"></div>
            </div>
            <div class="login">
                <h3 class="title">Nueva Contraseña</h3>
                <div class="text-input">
                    <i class="ri-lock-fill"></i>
                    <input type="text" name="password" id="password" placeholder="Contraseña Nueva">
                    <input type="hidden" name="idUsuarios" value="<?php echo $id; ?>">
                </div>
                <button class="login-btn" id="confirmar">Confirmar</button>
            </div>
        </div>
    </form>
    </div>
</body>

</html>
<script src="JS/ValidarUsuario.js"></script>