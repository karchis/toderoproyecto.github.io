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

    $queryTrabajador = "DELETE FROM tbl_trabajador WHERE trabajador_id = $id";
    $resultTrabajador = mysqli_query($conn, $queryTrabajador);


    if ($resultTrabajador) {
        header("Location: gestiontrabajadores.php");

        exit();
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
