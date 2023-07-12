<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todero";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

$queryAgendar = "SELECT * FROM tbl_agendar";
$resultAgendar = mysqli_query($conn, $queryAgendar);

if (!$resultAgendar) {
    die("Error en la consulta: " . mysqli_error($conn));
}
$fechaActual = date('Y-m-d H:i:s');
$fechaLimite = date('Y-m-d H:i:s', strtotime('-24 hours'));

$query = "SELECT agendar_id FROM tbl_agendar WHERE fecha <= '$fechaLimite'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($result)) {
    $agendar_id = $row['agendar_id'];
    $queryEliminar = "DELETE FROM tbl_agendar WHERE agendar_id = $agendar_id";
    mysqli_query($conn, $queryEliminar);
}

mysqli_close($conn);
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
            margin-top: 10px;
            padding: 50px;
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
            font-size: 15px;
        }

        th {
            font-size: 15px;
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

    </style>

    <div class="container">
        
</button>

        <h1><font color="#F2DA63;" style="margin-left: 30px; margin-top: 80px;">Gestión de Agenda</font></h1><br>
        
        <table class="table table-striped">
            <thead style="background-color: #F2DA63;">
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Disponibilidad</th>
                    <th>Descripción</th>
                    <th>Acciones</th> 
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($resultAgendar)): ?>
                <tr>
                    <td><?= $row['agendar_id']; ?></td>
                    <td><?= $row['fecha']; ?></td>
                    <td><?= $row['direccion']; ?></td>
                    <td><?= $row['telefono']; ?></td>
                    <td><?= $row['disponibilidad']; ?></td>
                    <td><?= $row['descripcion']; ?></td>
                    <td>

                        <button class="btn btn-warning" onclick="eliminarRegistro(<?= $row['agendar_id']; ?>)">Eliminar</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script>
    function eliminarRegistro(id) {
        if (confirm('¿Estás seguro de eliminar este registro?')) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // Actualizar la página después de la eliminación exitosa
                        location.reload();
                    } else {
                        alert('Error al eliminar el registro.');
                    }
                }
            };
            xhr.open('GET', `eliminar_agenda.php?agendar_id=${id}`, true);
            xhr.send();
        }
    }
</script>

</body>
</html>
