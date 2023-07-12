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

$tipoDocumentoFilter = isset($_GET['tipo_documento']) ? $_GET['tipo_documento'] : '';

if (!empty($tipoDocumentoFilter)) {
    $tipoDocumentoFilter = mysqli_real_escape_string($conn, $tipoDocumentoFilter);
    $queryInfo .= " WHERE tipo_documento = '$tipoDocumentoFilter'";
}

$resultInfo = mysqli_query($conn, $queryInfo);
$resultServicios = mysqli_query($conn, $queryServicios);

if (!$resultInfo || !$resultServicios) {
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
        @import url('https://fonts.googleapis.com/css2?family=Mukta:wght@800&display=swap');

        .container {
            margin-top: 15px;
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
            font-size: 11px;
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
        <br>
        <button class="btn btn-warning" style="color: #fff; text-decoration: none; margin-left: 10px;">
            <a href="añadir_empleado.php" style="text-decoration: none; color:#fff;">Añadir Empleado +</a>
        </button>

        <h1><font color="#F2DA63;" style="margin-left: 5px; margin-top: 80px;">Gestion de Empleados</font></h1><br><br>


        <form method="GET" action="">
            <label for="tipo_documento">Filtrar por tipo de documento:</label style="margin-left: 8px;">
            <select name="tipo_documento" id="tipo_documento">
                <option value="">Todos</option>
                <option value="Cedula de Ciudadania">Cedula de Ciudadania</option>
                <option value="Cedula de extranjeria">Cedula de extranjeria</option>
                <option value="Pasaporte">Pasaporte</option>
                <option value="targeta de registro migratorio">targeta de registro migratorio</option>
            </select>
            <button type="submit">Filtrar</button>
        </form>
        <br><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Tipo de Documento</th>
                    <th>Numero de Documento</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Link Whatsapp</th>
                    <th>Documentos</th>
                    <th>Acciones</th> 
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($resultInfo)): ?>
                <tr>
                    <td><?= $row['trabajador_id']; ?></td>
                    <td><?= $row['nombre']; ?></td>
                    <td><?= $row['apellido']; ?></td>
                    <td><?= $row['tipo_documento']; ?></td>
                    <td><?= $row['numero_documento']; ?></td>
                    <td><?= $row['fecha_nacimiento']; ?></td>
                    <td><?= $row['telefono']; ?></td>
                    <td><?= $row['correo']; ?></td>
                    <td><?= $row['link_whatsapp']; ?></td>
                    <td>
                        <ul>
                            <?php
                            $carpetaArchivos = 'archivos_pdf/';
                            $nombreArchivo = $row['documento_verificacion'];
                            echo '<li><a href="' . $carpetaArchivos . $nombreArchivo . '">' . $nombreArchivo . '</a></li>';
                            ?>
                        </ul>
                    </td>
                    <td>
                        <button class="btn btn-warning"><a style="color: #fff; text-decoration: none" href="actualizar_trabajador_conex.php?id=<?= $row['trabajador_id']; ?>">Actualizar</a></button>
                        <button class="btn btn-warning"><a style="color: #fff; text-decoration: none" href="eliminar_trabajador.php?id=<?= $row['trabajador_id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</a></button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>

    <script>
        function eliminarRegistro(id) {
            if (confirm('¿Estás seguro de eliminar este registro?')) {
                fetch(`eliminar_trabajador.php?id=${id}`)
                    .then(response => {
                        if (response.ok) {
                            location.reload();
                        } else {
                            alert('Error al eliminar el registro.');
                        }
                    })
                    .catch(error => {
                        alert('Error al eliminar el registro: ' + error);
                    });
            }
        }
    </script>
</body>
</html>
