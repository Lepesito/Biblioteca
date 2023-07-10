<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <title>Insertar</title>
</head>

<body>

</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
<?php
session_start();
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header('Location: index.php');
    exit();
}
?>
<?php
$secret = "6LdbU6skAAAAABH0ulTt15LusL4KkXXYM3tIwfOZ";
$response = $_POST["g-recaptcha-response"];
$remoteip = $_SERVER["REMOTE_ADDR"];
$url = "https://www.google.com/recaptcha/api/siteverify";
$data = array("secret" => $secret, "response" => $response, "remoteip" => $remoteip);
$options = array("http" => array("header" => "Content-type: application/x-www-form-urlencoded\r\n", "method" => "POST", "content" => http_build_query($data)));
$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) {
    echo "Error: " . file_get_contents($url, false, $context);
} else {
    $decoded_result = json_decode($result, true);
    if ($decoded_result["success"] == true) {

        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $gratis = $_POST['gratis'];
        $idAutores = $_POST['idAutores'];

        ?>
        <script>
            $.ajax({
                url: "InsertL.php",
                type: "POST",
                data: {
                    "titulo": "<?php echo $titulo; ?>",
                    "descripcion": "<?php echo $descripcion; ?>",
                    "precio": "<?php echo $precio; ?>",
                    "gratis": "<?php echo $gratis; ?>",
                    "idAutores": "<?php echo $idAutores; ?>",
                },
                success: function (data) {
                    console.log("Ajax success:", data);
                    var correcto = 'Registro exitoso';
                    var error = 'Error en el registro';
                    if (data == 1) {
                        window.location.href = "LibrosDatos.php?correcto=" + correcto;
                    } else {
                        console.log("Error: ", data.message);
                        window.location.href = "LibrosDatos.php?error=" + error;
                        
                    }
                    $('input').val('');
                },
                error: function (xhr, status, error) {
                    console.log("Ajax error:", status, error);
                    swal("Error", "Ocurrió un error en la conexión", "error");
                }
            });
        </script>
        <?php
    } else {
        $_SESSION['mensaje'] = 'Complete el reCAPTCHA';
        Header("Location: LibrosDatos.php");
    }
}
?>
