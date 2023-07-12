<?php
$servidor = "localhost";
$db = "todero";
$usuario = "root";
$contrasenia = "";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$db", $usuario, $contrasenia);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo $error->getMessage();
    exit();
}

$servicio_id = $_GET['id'];

$query = "SELECT t.nombre, t.apellido, t.telefono, t.correo, t.link_whatsapp, s.titulo_servicio, s.descripcion, s.foto
          FROM tbl_trabajador AS t
          INNER JOIN tbl_servicios AS s ON t.numero_documento = s.numero_documento
          WHERE s.servicios_id = :servicio_id";

$consulta = $conexion->prepare($query);
$consulta->bindParam(':servicio_id', $servicio_id);
$consulta->execute();

if ($consulta && $consulta->rowCount() > 0) {
    $trabajador = $consulta->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="./estilos/funcionsm.css">
    <title>Información del Trabajador y Servicio</title>
    <style>
    </style>
</head>
<body>
    <?php include('nav.php');?>
    <br><br>

    <div class="container">
        <div class="card">
            <br>
            <h2>Información del Servicio</h2><br>
            <div class="image-container">
                <img src="<?php echo $trabajador['foto']; ?>" alt="Imagen del servicio">
            </div>
            <p>Nombre del Servicio: <?php echo $trabajador['titulo_servicio']; ?></p>
            <p>Descripción: <?php echo $trabajador['descripcion']; ?></p>
            <br>
            <div class="info_trabajador">
                <p><b>Información del Trabajador</b></p>
                <p><b>Nombre: </b><?php echo $trabajador['nombre']; ?>&nbsp;<?php echo $trabajador['apellido']; ?></p>
                <p><b>Teléfono: </b><?php echo $trabajador['telefono']; ?></p>
                <p><b>Correo: </b><?php echo $trabajador['correo']; ?></p>
                <p><b>Link WhatsApp: </b><?php echo $trabajador['link_whatsapp']; ?></p>
            </div>
            <br>
            <a href="age.php" class="btn btn-warning" style="color:#fff;">Agendar</a>
        </div>
    </div>
    <div class="message"style="justify-content:right;text-align:right; margin-right:70px; margin-top:-300px; margin-left:580px;">
            <center><h2><b>¡Descubre nuestro increíble servicio!</b></h2>
            <h3>Nuestro equipo de profesionales altamente capacitados está listo para brindarte una experiencia excepcional.</h3></center>
    </div>
</body>
</html>
