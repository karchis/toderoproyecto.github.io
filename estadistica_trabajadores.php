<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todero";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener el número total de trabajadores
    $stmt = $pdo->prepare("SELECT COUNT(*) AS total_trabajadores FROM tbl_trabajador");
    $stmt->execute();
    $totalTrabajadores = $stmt->fetch(PDO::FETCH_ASSOC)['total_trabajadores'];

    // Obtener la edad promedio de los trabajadores
    $stmt = $pdo->prepare("SELECT AVG(DATEDIFF(CURDATE(), fecha_nacimiento) / 365) AS edad_promedio FROM tbl_trabajador");
    $stmt->execute();
    $edadPromedio = $stmt->fetch(PDO::FETCH_ASSOC)['edad_promedio'];

    // Obtener el trabajador más joven
    $stmt = $pdo->prepare("SELECT nombre, apellido, fecha_nacimiento FROM tbl_trabajador ORDER BY fecha_nacimiento ASC LIMIT 1");
    $stmt->execute();
    $trabajadorJoven = $stmt->fetch(PDO::FETCH_ASSOC);

    // Obtener el trabajador más antiguo
    $stmt = $pdo->prepare("SELECT nombre, apellido, fecha_nacimiento FROM tbl_trabajador ORDER BY fecha_nacimiento DESC LIMIT 1");
    $stmt->execute();
    $trabajadorAntiguo = $stmt->fetch(PDO::FETCH_ASSOC);

    // Obtener la cantidad de servicios por trabajador
    $stmt = $pdo->prepare("SELECT t.nombre, t.apellido, COUNT(s.servicios_id) AS cantidad_servicios
                           FROM tbl_trabajador t
                           JOIN tbl_servicios s ON t.numero_documento = s.numero_documento
                           GROUP BY t.nombre, t.apellido");
    $stmt->execute();
    $serviciosPorTrabajador = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Mostrar las estadísticas y la cantidad de servicios en tarjetas
    echo "<div class='card'>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>Estadísticas de Trabajadores</h5>";
    echo "<p class='card-text'>Total de trabajadores registrados: " . $totalTrabajadores . "</p>";
    echo "<p class='card-text'>Edad promedio de los trabajadores: " . round($edadPromedio, 2) . " años</p>";
    echo "<p class='card-text'>Trabajador más joven: " . $trabajadorJoven['nombre'] . " " . $trabajadorJoven['apellido'] . "</p>";
    echo "<p class='card-text'>Trabajador más antiguo: " . $trabajadorAntiguo['nombre'] . " " . $trabajadorAntiguo['apellido'] . "</p>";
    echo "</div>";
    echo "</div>";

    echo "<div class='card'>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>Cantidad de Servicios por Trabajador</h5>";
    foreach ($serviciosPorTrabajador as $trabajador) {
        echo "<p class='card-text'>" . $trabajador['nombre'] . " " . $trabajador['apellido'] . ": " . $trabajador['cantidad_servicios'] . " servicios</p>";
    }
    echo "</div>";
    echo "</div>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

    .card {
        width: 300px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 10px;
        padding: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        justify-content: center;
    }

    .card-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 14px;
        margin-bottom: 5px;
    }
</style>
<?php 
include('navadmin.php');
?>
</body>
</html>