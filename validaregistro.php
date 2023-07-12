<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todero"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];
    $contrasenia = $_POST['contrasenia'];

    // Validar y sanizar los datos ingresados por el usuario
    $usuario = htmlspecialchars($usuario);
    $nombre = htmlspecialchars($nombre);
    $apellido = htmlspecialchars($apellido);
    $correo = htmlspecialchars($correo);
    $rol = htmlspecialchars($rol);
    $contrasenia = htmlspecialchars($contrasenia);

    // Crear una conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error al conectar a la base de datos: " . $conn->connect_error);
    }

    // Preparar la consulta SQL con un marcador de posición
    $sql = "INSERT INTO tbl_registro (usuario, nombre, apellido, correo, rol, contrasenia)
            VALUES (?, ?, ?, ?, ?, ?)";

    // Preparar la sentencia
    $stmt = $conn->prepare($sql);

    // Vincular los parámetros con los valores
    $stmt->bind_param("ssssss", $usuario, $nombre, $apellido, $correo, $rol, $contrasenia);

    // Ejecutar la sentencia preparada
    if ($stmt->execute()) {
        if ($rol === "trabajador") {
            header("Location: logint.php");
            exit();
        } else if ($rol === "usuario") {
            header("Location: login.php");
            exit();
        } else {
            header("Location: otro-destino.php");
            exit();
        }
    } else {
        echo "Error al registrar el usuario: " . $stmt->error;
    }
    
    // Cerrar la sentencia y la conexión a la base de datos
    $stmt->close();
    $conn->close();
}
?>
