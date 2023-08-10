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
    <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>

<body>
    <form>
        <a href="index.php"><span style="font-size: 70px; color: white;"
                class="material-symbols-outlined">arrow_back_ios</span></a>
    </form>
    <form action="ValidarInicio.php" method="POST">
        <div class="container">
            <div class="design">
                <div class="pill-1 rotate-45"></div>
                <div class="pill-2 rotate-45"></div>
                <div class="pill-3 rotate-45"></div>
                <div class="pill-4 rotate-45"></div>
            </div>

            <div class="login">
                <h3 class="title">Inicio de Sesión</h3>
                <div class="text-input">
                    <i class="ri-user-fill"></i>
                    <input type="text" name="Usuario" placeholder="Username">
                </div>
                <div class="text-input">
                    <i class="ri-lock-fill"></i>
                    <input type="password" name="Password" id="password-input" placeholder="Contraseña">
                    <i class="reveal-icon ri-eye-fill" id="reveal-icon"></i>
                </div>
                <button class="login-btn">Entrar</button>
                <div id="google-signin-button"></div>
                <a href="recuperar.php" class="forgot">¿Olvidaste tu Contraseña?</a>
                <div class="create">
                    <a href="registrar.php">Crea tu Cuenta</a>
                    <i class="ri-arrow-right-fill"></i>
                </div>
            </div>
        </div>
        <script>
            const passwordInput = document.getElementById('password-input');
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
<script>
        function handleCredentialResponse(response) {
            console.log(response.credential);
        }

        google.accounts.id.initialize({
            client_id: '937291392613-80aersam1sajba116fopkd3c0pq4u6mv.apps.googleusercontent.com',
            callback: handleCredentialResponse
        });

        google.accounts.id.renderButton(
            document.getElementById('google-signin-button'),
            { theme: 'outline', size: 'large' }
        );
    </script>

</html>
