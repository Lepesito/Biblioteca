<?php
session_start();
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
  header('Location: index.php');
  exit();
}
?>
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
<link rel="icon" href="Images/libro.ico">
  <link rel="stylesheet" href="Estilos/datos.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <title>Libros</title>
</head>

<body class="body">
  <form id="bt" style="margin-left:2%;" action="libros.php">
    <a href="libros.php"><span style="color:white; font-size:50px;"
        class="material-symbols-outlined">arrow_back_ios</span></a>
  </form>
  <div id="air" class="container mt-5">

    <div class="form-floating mb-3">
      <input type="text" id="searchInput" class="form-control mb-3" placeholder="Búsqueda" oninput="searchTable()">
      <label for="floatingInput">Búsqueda</label>
    </div>
    <div class="divider py-1 bg-success form-control mb-3"></div>
    <div class="row">
      <div class="col-md-3" style="text-align:center;">
        <form class="form-floating mb-3" action="InsertarLibros.php" id="form" method="POST">
          <div class="form-floating mb-3">
            <input required type="text" class="form-control mb-3" name="titulo" id="titulo" placeholder="titulo">
            <label for="floatingInput">Titulo</label>
          </div>
          <div class="form-floating mb-3">
            <input required type="text" class="form-control mb-3" name="descripcion"
              id="descripcion" placeholder="Descripcion del libro">
            <label for="floatingInput">Descripcion</label>
          </div>
          <div class="form-floating mb-3">
            <input required type="number" class="form-control mb-3" name="precio"
              id="precio" placeholder="Nucleos Secundarios">
            <label for="floatingInput">Precio</label>
          </div>
          <div class="form-floating mb-3">
            <select required class="form-select" name="gratis" id="gratis">
              <option value=1>Si</option>
              <option selected value=0>No</option>
            </select>
            <label for="gratis">gratis</label>
          </div>
          <?php
          echo "<div class='form-floating mb-3'>";
          echo "<select name='idAutores' class='form-select mb-3' id='idAutores'>";
          while ($row2 = mysqli_fetch_array($resultado)) {
            echo "<option value='" . $row2['idAutores'] . "'>" . $row2['Nombre'] . "</option>";
          }
          echo "</select>";
          echo "<label for='idAutores'>Autores</label>";
          echo "</div>";          
          ?>
          <div id="captcha" class="g-recaptcha" name="g-recaptcha"
            data-sitekey="6LdbU6skAAAAAEYXOeq8XHSwwvCuUU6TJUtRFi2w"></div>
          <button type="submit" id="enviar" class="btn btn-success">Registrar</button>
        </form>
      </div>

      <div class="col-md-8" style="text-align:center;">
        <table class="table table-dark table-striped">
          <thead>
        <tr>
              <th style="display: none;">ID</th>
              <th>titulo Libro</th>
              <th>Autor</th>
              <th>Descripcion</th>
              <th>Precio</th>
              <th style="display: none;">Gratis</th>
              <th></th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <?php
             while ($row = mysqli_fetch_array($query)) {
              echo "<tr>";
              echo "<td style='display: none;'>" . $row['idLibros'] . "</td>";

              // Mostrar el título como enlace a Wikipedia
              $titulo = $row['titulo'];
              $tituloEnlace = buscarEnWikipedia($titulo);
              echo "<td><a href='$tituloEnlace' target='_blank'>$titulo</a></td>";

              // Mostrar el autor como enlace a Wikipedia si se encontraron resultados
              $autor = $row['autor'];
              $autorEnlace = '';
              if ($autor !== 'Autor desconocido') {
                  $autorEnlace = buscarEnWikipedia($autor);
                  echo "<td><a href='$autorEnlace' target='_blank'>$autor</a></td>";
              } else {
                  echo "<td>$autor</td>";
              }

              echo "<td>" . $row['descripcion'] . "</td>";
              echo "<td>" . $row['precio'] . "</td>";
              echo "<td style='display: none;'>" . $row['es_gratis'] . "</td>";
              echo "<td><a href='ActualizarLibros.php?id=" . $row['idLibros'] . "' class='btn btn-warning'>Editar</a></td>";
              echo "<td><a href='DeleteLibros.php?id=" . $row['idLibros'] . "' class='btn btn-danger'>Eliminar</a></td>";
              echo "</tr>";
          }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</body>

</html>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
  integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="JS/validar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
<script src="JS/animacion.js"></script>
<script>
  function searchTable() {
    let searchInput = document.getElementById("searchInput").value;
    searchInput = searchInput.toLowerCase();

    let tableRows = document.getElementsByTagName("tr");

    for (let i = 0; i < tableRows.length; i++) {
      let row = tableRows[i];
      let cells = row.getElementsByTagName("td");

      if (!cells.length) continue;

      let containsKeyword = false;
      for (let j = 0; j < cells.length; j++) {
        let cell = cells[j];
        if (cell.innerHTML.toLowerCase().indexOf(searchInput) > -1) {
          containsKeyword = true;
          break;
        }
      }

      if (containsKeyword) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    }
  }
</script>
<?php
if (isset($_GET['correcto'])) {
  $_SESSION['correcto'] = $_GET['correcto'];
  unset($_GET['correcto']);
}
if (isset($_GET['error'])) {
  $_SESSION['error'] = $_GET['error'];
  unset($_GET['error']);
}
if (isset($_SESSION['mensaje'])) {
  echo '<script>swal("Error", "' . $_SESSION['mensaje'] . '", "error");</script>';
  unset($_SESSION['mensaje']);
}
if (isset($_SESSION['correcto'])) {
  echo '<script>swal("Correcto", "' . $_SESSION['correcto'] . '", "success");</script>';
  unset($_SESSION['correcto']);
}
if (isset($_SESSION['error'])) {
  echo '<script>swal("Error", "' . $_SESSION['error'] . '", "error");</script>';
  unset($_SESSION['error']);
}
?>
<script>
  history.pushState({}, '', 'LibrosDatos.php');
</script>

<script>
  document.getElementById("gratis").addEventListener("change", function() {
    var precioInput = document.getElementById("precio");
    if (this.value == 1) {
      precioInput.readOnly = true;
      precioInput.value = 0;
    } else {
      precioInput.readOnly = false;
      precioInput.value = '';
    }
  });
</script>
