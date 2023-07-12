<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todero"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];

    

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error al conectar a la base de datos: " . $conn->connect_error);
    }

    // Obtener los datos del usuario desde la base de datos
    $sql = "SELECT * FROM tbl_registro WHERE usuario = '$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $contraseniaAlmacenada = $row['contrasenia'];

        // Verificar la contraseña ingresada con la almacenada
        if ($contrasenia === $contraseniaAlmacenada) {
            $rol = $row['rol'];

            // Redirigir según el rol del usuario
            if ($rol === "trabajador") {
                header("Location: bienvenidatrabajador.php");
                exit();
            } else if ($rol === "usuario") {
                header("Location: bienvenidausu.php");
                exit();
            }   else if ($rol === "administrador") {
                header("Location: bienvenidaadmin.php");
                exit();
            }
        } else {
            echo "<script>alert('Contraseña incorrecta'); window.location.href = 'login.php';</script>";
        }
    } else {
        echo "<script>alert('Usuario no encontrado'); window.location.href = 'login.php';</script>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}

?>