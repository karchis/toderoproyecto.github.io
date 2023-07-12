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
    $ID = $_GET['id'];

    $query = "SELECT * FROM tbl_registro WHERE ID = $ID";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $tservicios = mysqli_fetch_assoc($result);
    } else {
        die("servicio no encontrado.");
    }
} else {
    die("ID del registro no especificado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updateFields = array();

    if (!empty($_POST['usuario'])) {
        $usuario = $_POST['usuario'];
        $updateFields[] = "usuario = '$usuario'";
    }

    if (!empty($_POST['rol'])) {
        $rol = $_POST['rol'];
        $updateFields[] = "rol = '$rol'";
    }
    
    if (!empty($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        $updateFields[] = "nombre = '$nombre'";
    }

    if (!empty($_POST['apellido'])) {
        $apellido = $_POST['apellido'];
        $updateFields[] = "apellido = '$apellido'";
    }
    
    if (!empty($_POST['correo'])) {
        $correo = $_POST['correo'];
        $updateFields[] = "correo = '$correo'";
    }
    
    if (!empty($_POST['contrasenia'])) {
        $contrasenia = $_POST['contrasenia'];
        $updateFields[] = "contrasenia = '$contrasenia'";
    }
    
    if (!empty($updateFields)) {
        $updateQuery = "UPDATE tbl_registro SET " . implode(", ", $updateFields) . " WHERE ID = $ID";
        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            // Actualización exitosa, redirigir a una página de confirmación
            header("Location: actualizacion_usuario_mensaje.php?registro_id=$ID");
            exit();
        } else {
            die("Error al actualizar el trabajador: " . mysqli_error($conn));
        }
    }
}

include('nav.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./estilos/actualizar_conex.css">
    <style>
    </style>
</head>

<?php include('navadmin.php')?>

<body>
    <div class="container">
        <form class="form-register" action="" method="POST" enctype="multipart/form-data">
            <div class="text">
                <h2 style="text-align:center">Registro</h2><br>
            </div>
            <div class="form-group">
                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario"><br>
            </div>
            <div class="form-group">
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres"><br>
            </div>
            <div class="form-group">
                <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos"><br>
            </div>
            <div class="form-group">
                <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo electrónico"><br>
            </div>
            <div class="form-group">
                <input type="password" name="contrasenia" id="contrasenia" class="form-control" placeholder="Contraseña">
            </div>
            <div class="form-group">
                <label for="rol">Rol:</label>
                <select name="rol" class="form-control" style="border: 2px solid orange;">
                    <option value="administrador">Administrador</option>
                    <option value="trabajador">Trabajador</option>
                    <option value="usuario">Usuario</option>
                </select>
            </div>
            <div class="botones">
                <center><input type="submit" value="Registrar" name="Registrar" class="btn btn-warning"></center>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
