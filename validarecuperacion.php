<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $nuevaContraseña = isset($_POST['Password']) ? $_POST['Password'] : '';

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'todero';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die('Error de conexión a la base de datos: ' . $conn->connect_error);
    }


    $stmt = $conn->prepare("SELECT * FROM tbl_registro WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $stmt = $conn->prepare("UPDATE tbl_registro SET contrasenia = ? WHERE correo = ?");
        $stmt->bind_param("ss", $nuevaContraseña, $correo);
        if ($stmt->execute()) {
            header("Location: actualizacion_contrasenia.php?");
        } else {
            echo 'Error al actualizar la contraseña: ' . $stmt->error;
        }
    } else {
        echo "<script>alert('Correo incorrecto'); window.location.href = 'olvidaste_contrasenia.php';</script>";
        exit();
    }

    
    $stmt->close();
    $conn->close();
}
?>


<?php if (isset($error_message)) : ?>
    <div class="alert alert-danger"><?php echo $error_message; ?></div>
<?php endif; ?>
