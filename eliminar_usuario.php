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

    $queryUsuarios = "DELETE FROM tbl_registro WHERE ID = $id";


    $resultUsuarios = mysqli_query($conn, $queryUsuarios);

    if ($resultUsuarios) {
        header("Location: gestionarusuarios.php");

        exit();
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
