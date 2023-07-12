<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todero";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $servicios_id = $_GET['id'];

    $query = "SELECT * FROM tbl_servicios WHERE servicios_id = $servicios_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $tservicios = mysqli_fetch_assoc($result);
    } else {
        die("servicio no encontrado.");
    }
} else {
    die("ID del servicio no especificado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero_documento = $_POST['numero_documento'];
    $foto = isset($_FILES['info_foto']['name']) ? $_FILES['info_foto']['name'] : "";
    $foto_temp = isset($_FILES['info_foto']['tmp_name']) ? $_FILES['info_foto']['tmp_name'] : "";
    $tipo_servicio = $_POST['tipo_servicio'];
    $titulo_servicio = $_POST['titulo_servicio'];
    $descripcion = $_POST['descripcion'];

    // Construye una consulta SQL dinámica para actualizar los campos que se proporcionaron
    $updateQuery = "UPDATE tbl_servicios SET ";
    $updateFields = array();

    if (!empty($numero_documento)) {
        $updateFields[] = "numero_documento = '$numero_documento'";
    }
    if (!empty($foto)) {
        // Upload new photo and update the photo field in the database
        $uploadDir = "uploads/";
        $fotoFileName = uniqid() . "_" . $foto;
        $fotoPath = $uploadDir . $fotoFileName;

        if (move_uploaded_file($foto_temp, $fotoPath)) {
            $updateFields[] = "foto = '$fotoPath'";

            // Delete the previous photo file if it exists
            $previousFoto = $tservicios['foto'];
            if (!empty($previousFoto) && file_exists($previousFoto)) {
                unlink($previousFoto);
            }
        } else {
            die("Error occurred while uploading the new photo.");
        }
    }
    if (!empty($tipo_servicio)) {
        $updateFields[] = "tipo_servicio = '$tipo_servicio'";
    }
    if (!empty($titulo_servicio)) {
        $updateFields[] = "titulo_servicio = '$titulo_servicio'";
    }
    if (!empty($descripcion)) {
        $updateFields[] = "descripcion = '$descripcion'";
    }

    if (!empty($updateFields)) {
        $updateQuery .= implode(", ", $updateFields);
        $updateQuery .= " WHERE servicios_id = $servicios_id";

        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            header("Location: actualizacion_servicio_mensaje.php?servicios_id=$servicios_id");
            exit();
        } else {
            die("Error al actualizar el servicio: " . mysqli_error($conn));
        }
    } else {
        echo "No se proporcionaron campos para actualizar.";
    }
}

mysqli_close($conn);

include('nav.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="actualizar_servicios.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Actualizar Trabajador</title>

</head>
<style>
.form-control {
            border: 2px solid orange;
        }

</style>
<body>
    <div class="container">
        <form class="formservicios"  method="POST" enctype="multipart/form-data">
            <center><h1>Registrar Servicios</h1></center>
            <div class="form-group">
                <label for="numero_documento">Número de Documento:</label>
                <input type="text" id="numero_documento" name="numero_documento" class="form-control">
            </div>

            <div class="form-group">
                <label for="info_foto">Foto:</label>
                <input class="form-control" type="file" name="info_foto">
            </div>

            <div class="form-group">
                <label for="tipo_servicio">Tipo de servicio (mantenimiento, reparación):</label>
                <select class="form-control" name="tipo_servicio">
                    <option value="mantenimiento">Mantenimiento</option>
                    <option value="reparacion">Reparación</option>
                </select>
            </div>

            <div class="form-group">
                <label for="titulo_servicio">Nombre del servicio:</label>
                <select class="form-control" name="titulo_servicio">
                    <option value="Fontaneria">Fontanería</option>
                    <option value="Electricidad">Electricidad</option>
                    <option value="Carpinteria">Carpintería</option>
                    <option value="Pintura">Pintura</option>
                    <option value="Albañileria">Albañilería</option>
                    <option value="Servicios generales">Servicios generales</option>
                </select>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción del servicio:</label>
                <input class="form-control" type="text" name="descripcion" placeholder="Descripción del servicio">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-warning" style="width: 150px; height: 35px; font-size: 15px;">Agregar</button>
            </div>
        </form>
    </div>
</body>
</html>
