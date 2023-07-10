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
        <a href="iniciosesion.php"><span style="font-size: 70px; color: white;"
                class="material-symbols-outlined">arrow_back_ios</span></a>
    </form>
    <form action="InsertarUsuario.php" method="POST">
        <div class="container">
            <div class="design">
                <div class="pill-1 rotate-45"></div>
                <div class="pill-2 rotate-45"></div>
                <div class="pill-3 rotate-45"></div>
                <div class="pill-4 rotate-45"></div>
            </div>
            <div class="login">
                <h3 class="title">Registrar Nuevo Usuario</h3>
                <div class="text-input">
                    <i class="ri-user-fill"></i>
                    <input type="text" placeholder="Nombre de Usuario" name="nombre" id="nombre">
                </div>
                <div class="text-input">
                    <i class="ri-mail-fill"></i>
                    <input type="email" placeholder="Correo" name="correo" id="correo">
                </div>
                <div class="text-input">
                    <i class="ri-lock-fill"></i>
                    <input type="password" name="password" id="password" placeholder="Contraseña">
                    <i class="reveal-icon ri-eye-fill" id="reveal-icon"></i>
                </div>
                <button class="login-btn" id="registrar">Registrar</button>
                <a href="iniciosesion.php" class="forgot">Prefiero Iniciar Sesión</a>
                <div class="create">
                </div>
            </div>
        </div>
        <script>
            const passwordInput = document.getElementById('password');
            const revealIcon = document.getElementById('reveal-icon');

            revealIcon.addEventListener('click', () => {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                revealIcon.classList.toggle('ri-eye-fill');
                revealIcon.classList.toggle('ri-eye-off-fill');
            });
        </script>
    </form>
</body>

</html>
<script src="JS/ValidarUsuario.js"></script>