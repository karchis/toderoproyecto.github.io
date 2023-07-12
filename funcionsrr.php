<!DOCTYPE html>
<html>
<head>
    <title>Servicios reparacion</title>
    <style>@import url('https://fonts.googleapis.com/css2?family=Mukta:wght@800&display=swap');</style>
    <style>
        body {
            background-color: #d9d9d9;
        }

        .servicio-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .servicio-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f5f5f5;
            padding: 10px;
            margin: 10px;
            text-align: center;
            border: 1px solid #ccc; 
            border-radius: 5px;
            width: 300px; /* Ancho de la tarjeta */
        }

        .servicio-card img {
            width: 100%; /* Tamaño de la imagen */
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .servicio-card h2 {
            color: #333;
            margin-top: 0;
        }

        .servicio-card p {
            color: #666;
            margin-bottom: 10px;
        }

        .servicio-card a {
            display: inline-block;
            background-color: #f29f05;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }

        .servicio-card a:hover {
            background-color: #555;
        }
      
    </style>
    <script>
        // JavaScript
        // ...
    </script>
</head>
<body>
    <h1>Servicios de Reparación</h1>

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

    $query = "SELECT * FROM tbl_servicios WHERE tipo_servicio = 'reparacion'";
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
                <h2><?php echo $titulo_servicio; ?></h2>
                <img src="<?php echo $uploads; ?>" alt="Imagen del servicio">
                <p>Tipo de Servicio: <?php echo $tipoServicio; ?></p>
                <p>Descripción: <?php echo $descripcion; ?></p>
                <a href="functionsr.php?id=<?php echo $row['ID']; ?>">Info del trabajador</a>
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
