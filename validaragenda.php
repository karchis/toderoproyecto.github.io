<?php
// Perform form validation and processing here

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fecha = $_POST["fecha"];

    $fecha_actual = date("Y-m-d");
    if ($fecha < $fecha_actual) {
        echo "<script>alert('La fecha no puede ser anterior a la fecha actual.'); window.location.href = 'age.php';</script>";
        exit;
    }
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $disponibilidad = $_POST["disponibilidad"];
    $descripcion = $_POST["descripcion"];

    // Perform further validation and data processing as needed

    // Insert the data into the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "todero";

    // Create a new database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the database query
    $sql = "INSERT INTO tbl_agendar (fecha, direccion, telefono, disponibilidad, descripcion) VALUES ('$fecha', '$direccion', '$telefono', '$disponibilidad', '$descripcion')";

    if ($conn->query($sql) === TRUE) {
        header("Location: magenda.php?mensaje=Archivo subido correctamente.");
    } else {
      
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

   
    $conn->close();
}
?>
