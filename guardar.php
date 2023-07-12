<!--SECCION VALIDACION DE TRABAADORES-->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "todero"; 

    $conex = mysqli_connect($server, $user, $pass, $db) or die("Error al conectarse");

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $link_whatsapp = $_POST['link_whatsapp'];
    $documento_verificacion = $_FILES['documento_verificacion']['name'];

    $sql = "INSERT INTO tbl_trabajador(nombre, apellido, tipo_documento, numero_documento, fecha_nacimiento, telefono, correo, link_whatsapp, documento_verificacion) VALUES ('$nombre', '$apellido', '$tipo_documento', '$numero_documento', '$fecha_nacimiento', '$telefono', '$correo', '$link_whatsapp', '$documento_verificacion')";

    $ejecutar = mysqli_query($conex, $sql);

    if ($ejecutar) {
        echo '<div class="message">Usuario registrado exitosamente.</div>';
    } else {
        echo "Error al insertar datos: " . mysqli_error($conex);
    }

    mysqli_close($conex);
}
?>