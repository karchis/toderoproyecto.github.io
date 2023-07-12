<?php
$host = 'localhost';
$db = 'todero';
$user = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para obtener el último registro de la agenda
    $agendaSql = "SELECT * FROM tbl_agendar ORDER BY agendar_id DESC LIMIT 1";
    $agendaStmt = $conn->prepare($agendaSql);
    $agendaStmt->execute();
    $agenda = $agendaStmt->fetch(PDO::FETCH_ASSOC);

    // Consulta SQL para obtener el último registro de servicio
    $servicioSql = "SELECT * FROM tbl_servicios ORDER BY servicios_id DESC LIMIT 1";
    $servicioStmt = $conn->prepare($servicioSql);
    $servicioStmt->execute();
    $servicio = $servicioStmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;
?>

<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
<?php include('navtrabajador.php');?>

    <div class="container">
        <br><br><br>
        <div class="card">
            <h2>Mis proyectos:</h2><br>
            <p>Fecha: <?= $agenda['fecha'] ?></p>
            <p>Dirección: <?= $agenda['direccion'] ?></p>
            <p>Teléfono: <?= $agenda['telefono'] ?></p>
            <p>Disponibilidad: <?= $agenda['disponibilidad'] ?></p>
            <p>Descripción: <?= $agenda['descripcion'] ?></p>
            <p>Servicio: <?= $servicio['titulo_servicio'] ?></p>
            <p>Descripción del servicio: <?= $servicio['descripcion'] ?></p>
            <button onclick="mostrarMensaje()">Terminar servicio</button>
            <div id="mensaje" style="display: none; text-align:center;"><b>Servicio terminado</b></div>
        </div>
    </div>
</body>
<script>
    function mostrarMensaje() {
        var mensaje = document.getElementById("mensaje");
        mensaje.style.display = "block";
        // Ocultar el botón después de mostrar el mensaje
        var boton = document.getElementsByTagName("button")[0];
        boton.style.display = "none";
    }
  </script>
</script>
</html>
