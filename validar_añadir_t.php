<!--FORMULARIO DE REGISTRO DE TRABAJADORES-->
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todero";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $tipo_documento = $_POST["tipo_documento"];
    $numero_documento = $_POST["numero_documento"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $link_whatsapp = $_POST["link_whatsapp"];
    $documento_verificacion = $_FILES["documento_verificacion"]["name"];

  
    $query = "INSERT INTO tbl_trabajador (nombre, apellido, tipo_documento, numero_documento, fecha_nacimiento, telefono, correo, link_whatsapp, documento_verificacion) 
              VALUES ('$nombre', '$apellido', '$tipo_documento', '$numero_documento', '$fecha_nacimiento', '$telefono', '$correo', '$link_whatsapp', '$documento_verificacion')";

    if (mysqli_query($conn, $query)) {
        header("Location: gestiontrabajadores.php?");
        exit();
    } else {
        // Error occurred while inserting data
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>