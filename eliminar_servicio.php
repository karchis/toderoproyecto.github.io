<!--SECCION DE CRUD DE PERFIL BORRAR-->
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
    $id = $_GET['id'];

    $queryServicios = "DELETE FROM tbl_servicios WHERE servicios_id = $id";
    $resultServicios = mysqli_query($conn, $queryServicios);


    if ($resultServicios) {
        header("Location: gestionarservicio.php");

        exit();
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
