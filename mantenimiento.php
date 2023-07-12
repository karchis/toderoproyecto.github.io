<!DOCTYPE html>
<html>
<head>
    <title>Servicios Mantenimiento</title>
    <style>@import url('https://fonts.googleapis.com/css2?family=Mukta:wght@800&display=swap');</style>
    <style>

        body {
            background-color: #d9d9d9;
            font-family: Arial, sans-serif;
        }

        .servicio-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .servicio-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff;
            padding: 20px;
            margin: 10px;
            text-align: center;
            border: 1px solid #ccc; 
            border-radius: 10px;
            width: 300px; /* Ancho de la tarjeta */
            transition: all 0.3s ease;
        }

        .servicio-card:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        .servicio-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
        }

        .servicio-card h2 {
            color: #333;
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 20px;
        }

        .servicio-card p {
            color: #666;
            margin-bottom: 10px;
        }

        .servicio-card a {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f29f05;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            margin-top: auto;
        }

        .servicio-card a:hover {
            background-color: #e58500;
        }
      
    </style>
    
</head>
<body>
    <?php include('nav.php');
    ?>
    <br><br><br>
    <h1 style="text-align:center; text-decoration: underline; text-decoration-color: orange;">Servicios de Mantenimiento</h1><br>

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

    $query = "SELECT * FROM tbl_servicios WHERE tipo_servicio = 'mantenimiento'";
    $resultado = $conexion->query($query);

    if ($resultado) {
    ?>
        <!-- Contenedor de las tarjetas -->
        <div class="servicio-container">
        <?php
        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $titulo_servicio = $row["titulo_servicio"];
            $uploads = $row["foto"]; 
            $tipoServicio = $row["tipo_servicio"];
            $descripcion = $row["descripcion"];
        ?>
            <!-- Tarjeta de servicio -->
            <div class="servicio-card">
            <h2><?php echo $titulo_servicio; ?></h2><br>
            <img src="<?php echo $uploads; ?>" alt="Imagen del servicio"><br>
            <p>Tipo de Servicio: <?php echo $tipoServicio; ?></p><br>
            <p>Descripción: <?php echo $descripcion; ?></p><br>
            <a href="functionsm.php?id=<?php echo $row['servicios_id']; ?>">Ver Más</a>


            </div>
        <?php
        }
        ?>
        </div> <!-- Cierre del contenedor de las tarjetas -->
    <?php
    } else {
        echo "Error en la consulta: " . $conexion->errorInfo()[2];
    }
    ?>


</body>
</html>
