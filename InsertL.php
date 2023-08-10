<?php
session_start();
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header('Location: index.php');
    exit();
}
?>
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

include 'conexion.php';
$conexion = conectar();

$titulo = mysqli_real_escape_string($conexion, $_POST['titulo']);
$idAutores = mysqli_real_escape_string($conexion, $_POST['idAutores']);
$descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
$precio = mysqli_real_escape_string($conexion, $_POST['precio']);
$gratis = mysqli_real_escape_string($conexion, $_POST['gratis']);

$select = "SELECT * FROM bibliotecavirtual.libros WHERE titulo = '$titulo'";
$res_Select = mysqli_query($conexion, $select);

if (mysqli_num_rows($res_Select) == 0) {
    $insertar = "INSERT INTO bibliotecavirtual.libros (titulo, autor_id, descripcion, precio, es_gratis) VALUES ('$titulo', $idAutores, '$descripcion', $precio, $gratis)";
    echo mysqli_query($conexion, $insertar);
} else {
    echo '0';
}

mysqli_close($conexion);
?>