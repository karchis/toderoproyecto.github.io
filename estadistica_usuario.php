<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       .card {
    width: 350px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 10px auto;
    margin-top: 100px;
    padding: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: center; /* Centrar el contenido de la tarjeta */
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
</head>
<body>
    <?php 
    include('navadmin.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todero";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener el número total de registros
    $stmt = $pdo->prepare("SELECT COUNT(*) AS total_registros FROM tbl_registro");
    $stmt->execute();
    $totalRegistros = $stmt->fetch(PDO::FETCH_ASSOC)['total_registros'];

    // Obtener el número de registros por usuario
    $stmt = $pdo->prepare("SELECT usuario, COUNT(*) AS cantidad_registros FROM tbl_registro GROUP BY usuario");
    $stmt->execute();
    $registrosPorUsuario = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    echo "<div class='card'>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>Estadísticas de Registros</h5>";
    echo "<p class='card-text'>Total de registros: " . $totalRegistros . "</p>";
    echo "</div>";
    echo "</div>";

 
  

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>



    

</body>
</html>
