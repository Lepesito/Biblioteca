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
</head>

<body>
    <form>
        <a href="iniciosesion.php"><span style="font-size: 70px; color: white;"
                class="material-symbols-outlined">arrow_back_ios</span></a>
    </form>
    <form action="recuperar2.php" method="POST">
        <div class="container">
            <div class="design">
                <div class="pill-1 rotate-45"></div>
                <div class="pill-2 rotate-45"></div>
                <div class="pill-3 rotate-45"></div>
                <div class="pill-4 rotate-45"></div>
            </div>
            <div class="login">
                <h3 class="title">Recuperacion de Constraseña</h3>
                <div class="text-input">
                    <i class="ri-user-fill"></i>
                    <input type="text" name="nombre" autocomplete="off" placeholder="titulo de Usuario">
                </div>
                <div class="text-input">
                    <i class="ri-mail-fill"></i>
                    <input type="text" name="correo" autocomplete="off" placeholder="Correo electronico">
                </div>
                <button type="submit" class="login-btn">Siguiente</button>
            </div>
        </div>
    </form>
    </div>
</body>

</html>