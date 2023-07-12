<?php
$host = 'localhost';
$db = 'todero';
$user = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para obtener el trabajador recién insertado
    $trabajadorSql = "SELECT * FROM tbl_trabajador ORDER BY trabajador_id DESC LIMIT 1";
    $trabajadorStmt = $conn->prepare($trabajadorSql);
    $trabajadorStmt->execute();
    $trabajador = $trabajadorStmt->fetch(PDO::FETCH_ASSOC);

   
    $serviciosSql = "SELECT titulo_servicio, foto, tipo_servicio, descripcion 
                     FROM tbl_servicios
                     WHERE numero_documento = :numero_documento";
    $serviciosStmt = $conn->prepare($serviciosSql);
    $serviciosStmt->bindParam(":numero_documento", $trabajador['numero_documento']);
    $serviciosStmt->execute();
    $servicios = $serviciosStmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perfiles de Trabajadores</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card-item {
            flex-basis: 300px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }

        .card-item h3 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        .card-item img {
            width: 40%;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .no-services {
            text-align: center;
            margin-top: 20px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <?php include('navtrabajador.php');?>
    <div class="container">
        <div class="card">
            <div class="card-item">
                <br><br>
                <h3>Perfil</h3>
                <p><strong>Nombre:</strong> <?php echo $trabajador['nombre']; ?> <?php echo $trabajador['apellido']; ?></p>
                <p><strong>Tipo de documento:</strong> <?php echo $trabajador['tipo_documento']; ?></p>
                <p><strong>Número de documento:</strong> <?php echo $trabajador['numero_documento']; ?></p>
                <p><strong>Fecha de nacimiento:</strong> <?php echo $trabajador['fecha_nacimiento']; ?></p>
                <p><strong>Teléfono:</strong> <?php echo $trabajador['telefono']; ?></p>
                <p><strong>Correo:</strong> <?php echo $trabajador['link_whatsapp']; ?></p>
                <p><strong>Documento de verificación:</strong> <?php echo $trabajador['documento_verificacion']; ?></p>
                
            </div>

            <?php if (count($servicios) > 0) : ?>
                <?php foreach ($servicios as $servicio) : ?>
                    <div class="card-item">
                        <h3>Mis Servicios</h3>
                        <p><strong>Servicio:</strong> <?php echo $servicio['titulo_servicio']; ?></p>
                        <img src="<?php echo $servicio['foto']; ?>" alt="Foto del servicio" style=" height: 290px;">
                        <p><strong>Tipo de servicio:</strong> <?php echo $servicio['tipo_servicio']; ?></p>
                        <p><strong>Descripción:</strong> <?php echo $servicio['descripcion']; ?></p>
                    </div>
                    
                <?php endforeach; ?>
            <?php else : ?>
                <div class="no-services">No se encontraron servicios.</div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
