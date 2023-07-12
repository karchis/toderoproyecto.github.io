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

if (isset($_GET['agendar_id'])) {
    $id = $_GET['agendar_id'];

    $queryAgenda = "DELETE FROM tbl_agendar WHERE agendar_id = $id";
    $resultAgenda = mysqli_query($conn, $queryAgenda);

    if ($resultAgenda) {
        header("Location: gestionar_agenda.php");
        exit();
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
