<?php
session_start();
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header('Location: index.php');
    exit();
}
?>

<?php
include("conexion.php");
$con = conectar();

$idLibros = $_GET['id'];

$sql = "SELECT l.idLibros, l.titulo, a.nombre AS autor, l.descripcion, l.precio, l.es_gratis
FROM libros l
JOIN autores a ON l.autor_id = a.idAutores
WHERE l.idLibros = $idLibros;
";
$query = mysqli_query($con, $sql);
$sql2 = "SELECT idAutores, Nombre from autores";
$resultado = mysqli_query($con, $sql2);

$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body style="background: linear-gradient(to bottom right, #00f9f9, #09efd1, #3eff61);">
    <div class="container mt-5">
        <form action="UpdateLibros.php" method="POST">
            <input type="hidden" class="form-control mb-3" name="idLibros" value="<?php echo $row[0] ?>" placeholder="idLibros">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $row[1] ?>" placeholder="Título">
            </div>
            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <select class="form-select" name="autor" id="autor">
                    <?php
                    while ($row2 = mysqli_fetch_array($resultado)) {
                        if ($row2['idAutores'] == $row['autor_id']) {
                            echo "<option value='" . $row2['idAutores'] . "' selected>" . $row2['Nombre'] . "</option>";
                        } else {
                            echo "<option value='" . $row2['idAutores'] . "'>" . $row2['Nombre'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Descripción"><?php echo $row[3] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" min="0" step="0.01" class="form-control" name="precio" id="precio" value="<?php echo $row[4] ?>" placeholder="Precio">
            </div>
            <div class="mb-3">
                <label for="esGratis" class="form-label">¿Es Gratis?</label>
                <select class="form-select" name="esGratis" id="esGratis">
                    <option value="1" <?php if ($row[5] == 1) echo 'selected' ?>>Si</option>
                    <option value="0" <?php if ($row[5] == 0) echo 'selected' ?>>No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Enviar</button>
        </form>
    </div>
</body>

</html>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    var esGratisDropdown = document.getElementById('esGratis');
    var precioInput = document.getElementById('precio');
    var precioAnterior = <?php echo $row[4]; ?>; // Obtener el precio anterior desde PHP

    // Evento de cambio del menú desplegable de "esGratis"
    esGratisDropdown.addEventListener('change', function() {
      if (esGratisDropdown.value == 1) {
        // Si es "Sí", deshabilita el campo de texto de "precio" y establece su valor en 0
        precioInput.ReadOnly = true;
        precioInput.value = 0;
      } else {
        // Si es diferente de "Sí", habilita el campo de texto de "precio" y establece su valor como el precio anterior
        precioInput.ReadOnly = false;
        precioInput.value = precioAnterior;
      }
    });
  });
</script>
