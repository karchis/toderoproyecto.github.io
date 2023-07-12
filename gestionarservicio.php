<!--PERFIL TRABAJADOR-->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todero";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

$queryInfo = "SELECT * FROM tbl_trabajador";
$queryServicios = "SELECT * FROM tbl_servicios";

$resultInfo = mysqli_query($conn, $queryInfo);
$resultServicios = mysqli_query($conn, $queryServicios);

if (!$resultInfo || !$resultServicios) {
    die("Error en la consulta: " . mysqli_error($conn));
}

// Get distinct service types
$queryServiceTypes = "SELECT DISTINCT tipo_servicio FROM tbl_servicios";
$resultServiceTypes = mysqli_query($conn, $queryServiceTypes);

if (!$resultServiceTypes) {
    die("Error en la consulta: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="../styles.css">
    <style>@import url('https://fonts.googleapis.com/css2?family=Mukta:wght@800&display=swap');</style>
</head>
<body>
    <?php include('navadmin.php');?>
    <style>
     
     .container {
            margin-top: 35px;
            padding: 2px;
            background-color: #F9F9F9;
            border: 2px solid #CCCCCC;
            border-radius: 5px;
        }

        h1 {
            font-family: 'Mukta', sans-serif;
            margin-left: 5px;
            margin-top: 80px;
        }

        .btn.btn-warning {
            color: #fff;
        }

        table {
            font-size: 13px;
        }

        th {
            font-size: 13px;
            font-weight: bold;
        }

        .btn-group {
            margin: 5px;
        }

        .btn-group a {
            color: #fff;
            text-decoration: none;
        }

        .btn-group .btn-warning {
            background-color: #FFB84D;
            border-color: #FFB84D;
        }

        .btn-group .btn-warning:hover {
            background-color: #FFA33B;
            border-color: #FFA33B;
        }
    </style>

    <div class="container">
<button class="btn btn-warning" style="color: #fff; text-decoration: none; margin-left: 10px;">
    <a href="añadir_servicio.php" style="text-decoration: none; color:#fff;">Añadir Servicio +</a>
</button>

        <h1><font color="#F2DA63;" style="margin-left: 30px; margin-top: 80px;">Gestion de Servicios</font></h1><br>
        
        <label for="filtro">Filtrar por tipo de servicio:</label>
        <select id="filtro" onchange="filterServices()">
            <option value="">Todos</option>
            <?php while ($row = mysqli_fetch_assoc($resultServiceTypes)): ?>
                <option value="<?= $row['tipo_servicio']; ?>"><?= $row['tipo_servicio']; ?></option>
            <?php endwhile; ?>
        </select>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Tipo de Servicio</th>
                    <th>Nombre del Servicio</th>
                    <th>Descripción</th>
                    <th>Acciones</th> 
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($resultServicios)): ?>
                <tr class="service-row" data-service-type="<?= $row['tipo_servicio']; ?>">
                    <td><?= $row['servicios_id']; ?></td>
                    <td><img src="<?= $row['foto']; ?>" alt="Foto del servicio" style="height:70px; width:80px;"></td>
                    <td><?= $row['tipo_servicio']; ?></td>
                    <td><?= $row['titulo_servicio']; ?></td>
                    <td><?= $row['descripcion']; ?></td>
                    <td>
                        <button class="btn btn-warning"><a style="color: #fff; text-decoration: none; backgroud-color: #F29F05" href="actualizar_servicio.php?id=<?= $row['servicios_id']; ?>">Actualizar</a><br></button>
                        <button class="btn btn-warning"><a style="color: #fff; text-decoration: none" href="eliminar_servicio.php?id=<?= $row['servicios_id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</a><br></button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script>
        function filterServices() {
            var select = document.getElementById('filtro');
            var selectedType = select.options[select.selectedIndex].value;
            var services = document.getElementsByClassName('service-row');

            for (var i = 0; i < services.length; i++) {
                var serviceType = services[i].getAttribute('data-service-type');
                if (selectedType === '' || selectedType === serviceType) {
                    services[i].style.display = 'table-row';
                } else {
                    services[i].style.display = 'none';
                }
            }
        }
    </script>
</body>
</html>
