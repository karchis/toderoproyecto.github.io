<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas y Respuestas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mukta:wght@800&display=swap');

        body {
            background-color: #F2DA63;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            margin: 70px auto;
            max-width: 800px;
        }

        .text {
            margin-top: 20px;
            text-align: center;
            font-family: 'Mukta', sans-serif;
        }

        /* Estilos para el menú de navegación */
        .navbar {
            background-color: #F29F05;
        }

        .navbar-logo {
            width: 90px;
            padding: 10px;
        }

        .navbar-logo img {
            width: 100%;
        }

        .navbar-buttons {
            margin-left: auto;
        }

        .navbar-buttons a {
            color: rgb(0, 0, 0);
            text-decoration: none;
            padding: 10px;
            margin-right: 10px;
        }

        .navbar-buttons a:hover {
            background-color: #F2DA63;
        }

    </style>
</head>
<body>
<?php 
include('nav.php');

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todero";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener la información del usuario
$sql = "SELECT * FROM tbl_registro";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar la información del usuario en una tabla
    echo "<div class='container'>";
    echo "<table class='table'>";
    echo "<thead><tr><th>Nombre</th><th>Email</th><th>Edad</th></tr></thead>";
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["correo"] . "</td>";
        echo "<td>" . $row["telefono"] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
} else {
    echo "No se encontraron registros de usuarios.";
}

$conn->close();
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
