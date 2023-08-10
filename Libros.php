<?php session_start(); ?>
<?php
require_once 'api.php';
include("conexion.php");
$con = conectar();
$sql = "SELECT l.idLibros, l.titulo, a.nombre AS autor, l.descripcion, l.precio, l.es_gratis
FROM libros l
JOIN autores a ON l.autor_id = a.idAutores;
";
$sql2 = "SELECT idAutores, Nombre from autores";
$resultado = mysqli_query($con, $sql2);
$query = mysqli_query($con, $sql);
/*  echo "<pre>";
print_r($query);
echo "</pre>";*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="Estilos/index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <link rel="icon" href="Images/libro.ico">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Libros</title>
</head>

<body class="body">
<nav style="position: relative;" class="navbar bg-body-tertiary fixed-top color-rosa">
    <div class="container-fluid">
      <a class="navbar-brand" href="Index.php">
        <img id="ut" src="Images/libro1.png" alt="Logo">
      </a>
      <a id="miEnlace">BIblioteca Virtual de la Universidad Tecnologica de Nayarit</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-center">
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
              <?php
              if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'admin') { ?>
              <li>
                <a class="dropdown-item" href="LibrosDatos.php">Datos</a>
              </li>
            <?php } ?>
          </ul>
       
        </div>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12 mb-4">
        <form method="post">
          <label for="filtroAutor" class="form-label">Filtrar por autor:</label>
          <select class="form-select" id="filtroAutor" name="filtroAutor">
            <option value="">Todos los autores</option>
            <?php while ($autor = mysqli_fetch_array($resultado)): ?>
              <option value="<?php echo $autor['idAutores']; ?>"><?php echo $autor['Nombre']; ?></option>
            <?php endwhile; ?>
          </select>
          <button type="submit" class="btn btn-primary mt-3">Filtrar</button>
        </form>
      </div>

      <?php 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          // Obtener el autor seleccionado del formulario
          $autorSeleccionado = isset($_POST['filtroAutor']) ? $_POST['filtroAutor'] : '';
          
          // Escapar el valor del autor seleccionado para evitar ataques de inyección SQL
          $autorSeleccionado = mysqli_real_escape_string($con, $autorSeleccionado);
          
          // Verificar si se seleccionó un autor específico o si se quiere mostrar todos los autores
          if (!empty($autorSeleccionado)) {
            // Construir la consulta SQL para obtener los libros filtrados por autor
            $sql = "SELECT l.idLibros, l.titulo, a.nombre AS autor, l.descripcion, l.precio, l.es_gratis
                    FROM libros l
                    JOIN autores a ON l.autor_id = a.idAutores
                    WHERE a.idAutores = $autorSeleccionado;";
            $query = mysqli_query($con, $sql);
          } else {
            // Si no se seleccionó un autor específico, mostrar todos los libros sin filtrar
            $query = mysqli_query($con, $sql);
          }
        } else {
          // Si no se envió el formulario de filtro, mostrar todos los libros sin filtrar
          $query = mysqli_query($con, $sql);
        }
        
        ?>

      <?php
      while ($row = mysqli_fetch_array($query)) {
        $titulo = $row['titulo'];
        $tituloEnlace = buscarEnWikipedia($titulo);
        $autor = $row['autor'];
        $descripcion = $row['descripcion'];
        $precio = $row['precio'];
        $esGratis = $row['es_gratis'];

        // Mostrar el autor como enlace a Wikipedia si se encontraron resultados
        $autorEnlace = '';
        if ($autor !== 'Autor desconocido') {
          $autorEnlace = buscarEnWikipedia($autor);
        }
        ?>
          <div class="col-md-4 mb-4">
            <div class="card bg-custom-gradient text-white">
              <div class="card-body bodys">
                <h5 class="card-title"><a href="<?php echo $tituloEnlace; ?>" target="_blank"><?php echo $titulo; ?></a>
                </h5>
                <?php if ($autorEnlace !== ''): ?>
                  <p class="card-text">Autor: <a href="<?php echo $autorEnlace; ?>" target="_blank"><?php echo $autor; ?></a></p>
                <?php else: ?>
                  <p class="card-text">Autor:
                    <?php echo $autor; ?>
                  </p>
                <?php endif; ?>
                <p class="card-text">
                  <?php echo $descripcion; ?>
                </p>
                <p class="card-text">Precio: $
                  <?php echo $precio; ?>
                </p>
              </div>
            </div>
          </div>
        <?php
      }
      ?>
    </div>
  </div>

  <footer class="bg-dark text-center text-white degradado-morado">
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