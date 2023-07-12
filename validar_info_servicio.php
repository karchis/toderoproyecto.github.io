<?php
$servidor = "localhost";
$db = "todero";
$usuario = "root";
$contrasenia = "";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$db", $usuario, $contrasenia);
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