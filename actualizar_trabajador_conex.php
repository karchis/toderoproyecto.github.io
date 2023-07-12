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
    $trabajador_id = $_GET['id'];

    $query = "SELECT * FROM tbl_trabajador WHERE trabajador_id = $trabajador_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $trabajador = mysqli_fetch_assoc($result);
    } else {
        die("Trabajador no encontrado.");
    }
} else {
    die("ID del trabajador no especificado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updateFields = array();
    
    if (!empty($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        $updateFields[] = "nombre = '$nombre'";
    }
    
    if (!empty($_POST['apellido'])) {
        $apellido = $_POST['apellido'];
        $updateFields[] = "apellido = '$apellido'";
    }
    
    if (!empty($_POST['tipo_documento'])) {
        $tipo_documento = $_POST['tipo_documento'];
        $updateFields[] = "tipo_documento = '$tipo_documento'";
    }
    
    if (!empty($_POST['numero_documento'])) {
        $numero_documento = $_POST['numero_documento'];
        $updateFields[] = "numero_documento = '$numero_documento'";
    }
    
    if (!empty($_POST['fecha_nacimiento'])) {
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $updateFields[] = "fecha_nacimiento = '$fecha_nacimiento'";
    }
    
    if (!empty($_POST['telefono'])) {
        $telefono = $_POST['telefono'];
        $updateFields[] = "telefono = '$telefono'";
    }
    
    if (!empty($_POST['correo'])) {
        $correo = $_POST['correo'];
        $updateFields[] = "correo = '$correo'";
    }
    
    if (!empty($_POST['link_whatsapp'])) {
        $link_whatsapp = $_POST['link_whatsapp'];
        $updateFields[] = "link_whatsapp = '$link_whatsapp'";
    }
    
    if (!empty($_FILES['documento_verificacion']['name'])) {
        
        $documento_verificacion = $uploadedFile;
        $updateFields[] = "documento_verificacion = '$documento_verificacion'";
    }
    
    if (!empty($updateFields)) {
        $updateQuery = "UPDATE tbl_trabajador SET " . implode(", ", $updateFields) . " WHERE trabajador_id = $trabajador_id";
        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            header("Location: actualizacion_trabajador_mensaje.php?registro_id=$trabajador_id");
            exit();
        } else {
            die("Error al actualizar el trabajador: " . mysqli_error($conn));
        }
    }
}


mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Trabajador</title>
</head>
<style>
        
    
        body {
            background-color: #f4f4f4;
        }
        .container {
       
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        label {
            font-weight: bold;
            color: #333;
        }
        input[type="text"],
        input[type="date"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 15px;
            border: 2px solid orange; 
        }
        input[type="submit"] {
            background-color: #F2DA63;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #E8C64F;
        }
        .cancel-btn {
            background-color: #D9D9D9;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            font-size: 16px;
        }
        .cancel-btn:hover {
            background-color: #BFBFBF;
        }</style>
<body>
<?php
include('navtrabajador.php');
?>

    <h2>Actualizar Trabajador</h2>
    <form method="POST" action="">
    <div class="container">
        <form class="formtrabajador" action="validatrabajador.php"  method="POST" enctype="multipart/form-data">
            <h1 class="titulo" <font color="#F2DA63;">Formulario de Registro</font></h1>
            <br>
            <div class="form-group">
                <label for="nombre">Nombres:</label>
                <input class="controls" type="text" name="nombre" placeholder="Nombres"><br>
            </div>
            <div class="form-group">
                <label for="apellido">Apellidos:</label>
                <input class="controls" type="text" name="apellido" placeholder="Apellidos" ><br>
            </div>
            <div class="form-group">
                <label for="tipo_documento">Tipo de documento:</label>
                <select class="controls" name="tipo_documento" type="select" id="tipo_documento" style="border: 2px solid orange;">
                    <option value="DNI">DNI</option>
                    <option value="Cedula de ciudadania">Cedula de ciudadania</option>
                    <option value="Cedula de extranjeria">Cedula de extranjeria</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
            </div>
            <div class="form-group">
                <label for="numero_documento">Numero de documento:</label>
                <input class="controls" type="text" name="numero_documento" placeholder="Numero de documento" ><br>
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input class="controls" type="date" name="fecha_nacimiento"><br>
            </div>

            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input class="controls" type="text" name="telefono" placeholder="Telefono" ><br>
            </div>

            <div class="form-group">
                <label for="correo">Correo:</label>
                <input class="controls" type="email" name="correo" placeholder="Correo Electronico" ><br>
            </div>

            <div class="form-group">
                <label for="link_whatsapp">Enlace de WhatsApp:</label>
                <input class="controls" type="text" name="link_whatsapp" placeholder="Link Whatsapp"><br>
            </div>

            <div class="form-group">
                <label for="documento_verificacion">Documento de verificación (PDF):</label>
                <input class="controls" type="file" name="documento_verificacion"  accept="application/pdf">
            </div>
        
            <div style="text-align: center;">
                <button type="submit" class="btn btn-warning" style="width: 150px; height: 35px; font-size: 15px;">Agregar</button>
            </div>
    </form>
</body>
</html>
