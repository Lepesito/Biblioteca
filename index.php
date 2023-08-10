<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="Estilos/index.css">
  <link rel="icon" href="Images/libro.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Libreria UT</title>
</head>

<body class="body">
<nav class="navbar bg-body-tertiary fixed-top color-rosa">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img id="ut" src="Images/libro1.png">
      </a>
      <a id="miEnlace">Biblioteca Virtual de la Universidad Tecnologica de Nayarit</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><a href="index.php">Menú</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="Libros.php">Libros</a>
            </li>
            <li class="nav-item">
              <?php
              if (isset($_SESSION['tipo'])) {
                ?>
                <a href="logout.php" class="btn btn-danger"><i class="bi bi-box-arrow-in-left"></i> Cerrar sesión</a>
              <?php } else { ?>
                <a href="iniciosesion.php"><span>Inicar Sesión</span></a>
              <?php } ?>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Utilidades
              </a>
            </li>
          </ul>
          </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <section> <!-- aqui inicia el carousel de prueba-->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img id="img" src="Images/portadas/1.jpg" alt="Image 1">
          <div id="text" class="carousel-caption">
            <h3></h3>
            <p></p>
          </div>
        </div>

        <div class="item">
          <img id="img" src="Images/portadas/2.jpg" alt="Image 2">
          <div id="text" class="carousel-caption">
            <h3></h3>
            <p></p>
          </div>
        </div>

        <div class="item">
          <img id="img" src="Images/portadas/3.jpg" alt="Image 3">
          <div id="text" class="carousel-caption">
            <h3></h3>
            <p></p>
          </div>
        </div>

        <div class="item">
          <img id="img" src="Images/portadas/4.jpg" alt="Image 4">
          <div id="text" class="carousel-caption">
            <h3></h3>
            <p></p>
          </div>
        </div>
      </div>

      <!-- Left and right controls -->
      <a id="carousel-prev" class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a id="carousel-next" class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section> <!-- aqui acaba el carousel -->
  <div id="contenedor">
    <section id="bienvenidos">
      <h2>Bienvenidos</h2>
      <p>La Biblioteca Digital del Centro de Bachillerato José Vasconcelos SC. tiene por objetivo reunir información de
        carácter especializada en materia de educación media superior, con la finalidad de apoyar a través de sus
        servicios a la comunidad estudiantil, profesores y público en general en el conocimiento, estudio y divulgación
        de temas referentes a las áreas de Matemáticas, Informática, Historia, Literatura, Biología y Sociales.</p>
      <p>Nuestro objetivo consiste en mantener, custodiar y enriquecer desde la Biblioteca Digital el acervo
        bibliográfico con el que cuenta el Centro de Bachillerato José Vasconcelos SC. mediante la adquisión de material
        especializado y el intercambio de publicaciones con Organismos Nacionales e Internacionales en materia de
        educación media superior.</p>
      <p>La Biblioteca Digital apoya a los usuarios a través del acceso ágil y oportuno a las colecciones y servicios
        disponibles desde la biblioteca central, con el fin de satisfacer las necesidades de información que se derivan
        de las tareas inherentes al estudio, enseñanza, investigación y difusión sobre educación media superior.</p>
      <!-- </section><form id="frm_registro_usuarios" name="frm_registro_usuarios" action="" enctype="application/x-www-form-urlencoded">
        <fieldset>
           <legend>Formulario de Registro</legend>
           <div>
            <label for="txt_nombre_usuario">Nombre</label>
            <input type="text" name="txt_nombre_usuario" id="txt_nombre_usuario" placeholder="Tu nombre completo">
          </div>
          <div>
            <label for="txt_email_usuario">Correo Electrónico</label>
            <input type="email" name="txt_email_usuario" id="txt_email_usuario" placeholder="Tu correo electrónico">
          </div>
          <div>
            <label for="txt_password_usuario">Contraseña</label>
            <input type="password" name="txt_password_usuario" id="txt_password_usuario" placeholder="Tu contraseña">
          </div>
          <input type="submit" value="Registrar Usuario" name="btn_registrar_usuario" id="btn_registrar_usuario" class="cambio">
        </fieldset>
      </form> -->
      <section id="objetivo">
        <article>
          <h2>Misión</h2>
          <figure>
            <img src="Images/bd_bibliograficas.jpg" alt="">
            <p>Ofrecer a nuestros usuarios diversas fuentes de información en formato electrónico las cuales pueden
              servir como complemento a la Bibliografía básica que utilizan en el aula, con la intención de contribuir
              en el desarrollo de habilidades en el proceso de búsqueda y recuperación.</p>
          </figure>
        </article>
        <article>
          <h2>Visión</h2>
          <figure>
            <img src="Images/bibliotecas_al.jpg" alt="">
            <p>Satisfacer las demandas de información de nuestra comunidad académica a través del uso de las nuevas
              tecnologías de la información y la comunicación.</p>
          </figure>
        </article>
        <article>
          <h2>Filosofía</h2>
          <figure>
            <img src="Images/manuales.jpg" alt="">
            <p>Promover la consulta a los medios bibliográficos electrónicos como apoyo a los diferentes programas
              académicos que se ofertan en nuestra Institución educativa y contribuir en los procesos de generación de
              nuevos conocimientos de académicos, investigadores y futuros profesionales.</p>
          </figure>
        </article>
      </section>
  </div>
  <footer  class="bg-dark text-center text-white degradado-morado">
    <div class="container p-4">
      <section class="mb-4">
        <a id="

Redes" class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-facebook-f">
            <img class="RedesSociales" src="Images/Facebook.png" alt="Facebook">
          </i>
        </a>
        <a id="Redes" class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-twitter">
            <img class="RedesSociales" src="Images/Twitter.png" alt="Twitter">
          </i>
        </a>
        <a id="Redes" class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-google">
            <img class="RedesSociales" src="Images/Google.png" alt="Google">
          </i>
        </a>
        <a id="Redes" class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-instagram">
            <img class="RedesSociales" src="Images/Instagram.png" alt="Instagram">
          </i>
        </a>
        <a id="Redes" class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-linkedin-in">
            <img class="RedesSociales" src="Images/Linkedin.png" alt="Linkedin">
          </i>
        </a>
        <a id="Redes" class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-github">
            <img class="RedesSociales" src="Images/github.png" alt="Github">
          </i>
        </a>
      </section>
      <section class="">
        <form action="">
          <div class="row d-flex justify-content-center">
            <div class="col-auto">
              <p class="pt-2">
                <strong>Sign up for our newsletter</strong>
              </p>
            </div>
            <div class="col-md-5 col-12">
              <div class="form-outline form-white mb-4">
                <input type="email" id="form5Example21" class="form-control" />
                <label class="form-label" for="form5Example21">Email address</label>
              </div>
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-outline-light mb-4">Subscribe</button>
            </div>
          </div>
        </form>
      </section>
    </div>
    <div class="text-center p-3" style="background-color: ##15052f;">
      <a href="#" class="material-symbols-outlined">
        <i class="fas fa-arrow-left">
          <span style="color:rgb(255, 255, 255); font-size:40px;" class="material-symbols-outlined">arrow_upward</span>
        </i>
      </a>
    </div>
  </footer>
</body>
</html>

