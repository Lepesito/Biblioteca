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

$ID = $_POST['idLibros'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$esGratis = $_POST['esGratis'];

// Si esGratis es "Sí", establece el valor de precio a 0
if ($esGratis === 1) {
    $precio = 0;
}

$sql = "UPDATE libros SET titulo='$titulo', autor_id=$autor, descripcion='$descripcion', precio=$precio, es_gratis=$esGratis WHERE idLibros = $ID";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: LibrosDatos.php");
}
?>


