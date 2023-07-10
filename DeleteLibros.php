<?php
session_start();
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header('Location: index.php');
    exit();
}
?>
<?php
include("conexion.php");
$con=conectar();

$idLibros = $_GET['id'];

$sql="DELETE FROM libros WHERE idLibros=$idLibros";
$query=mysqli_query($con,$sql);

if($query){
    Header("Location: LibrosDatos.php");
}else {
}
?>