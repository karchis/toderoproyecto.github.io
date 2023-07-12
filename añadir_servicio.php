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
    $numeroDocumento = $_POST["numero_documento"];
    $foto = $_POST["foto"];
    $tipoServicio = $_POST["tipo_servicio"];
    $tituloServicio = $_POST["titulo_servicio"];
    $descripcion = $_POST["descripcion"];
    
    
    if (!empty($numeroDocumento) && !empty($tipoServicio) && !empty($tituloServicio) && !empty($descripcion)) {
        $numeroDocumento = mysqli_real_escape_string($conn, $numeroDocumento);
        $tipoServicio = mysqli_real_escape_string($conn, $tipoServicio);
        $tituloServicio = mysqli_real_escape_string($conn, $tituloServicio);
        $descripcion = mysqli_real_escape_string($conn, $descripcion);
        

        $query = "INSERT INTO tbl_servicios (numero_documento, tipo_servicio, titulo_servicio, descripcion) VALUES ('$numeroDocumento', '$tipoServicio', '$tituloServicio', '$descripcion')";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            header("Location: actualizacion_servicio_mensaje.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Actualizar Trabajador</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mukta:wght@800&display=swap');

        body {
            background-color: #d9d9d9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 20px;
            max-width: 50px;
            width: 50%;
            border-radius: 15px;
            margin-top: 200px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .form-register {
            margin: 0;
            margin-top: 20px;
        }

        .display-4 {
            margin-top: 60px;
            text-align: center;
            font-size: 40px;
            color: 000;
            margin-left: 20px;
            margin-right: 20px;
        }

        .btn-warning {
            background-color: #FFC107;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .btn-warning:hover {
            background-color: #FFA000;
        }

        .sec {
            font-size: 12px;
            border: none;
            width: 150px;
            display: block;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            color: #000;
            text-decoration: none;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"] {
            width: 100%;
            height: 30px;
            font-size: 15px;
            text-align: center;
            border: 2px solid orange;
            text-align: left;
        }

        .form-control {
            border-color: #F2DA63;
            font-size: 18px;
            height: 45px;
            width: 100%;
            padding: 10px;
            outline: none;
        }

        .terms {
            margin-top: 20px;
            background-color: white;
            padding: 15px;
            border-radius: 5px;
        }

        h4 {
            margin: 0;
            font-size: 20px;
            color: #F2DA63;
        }

        ul {
            margin-top: 10px;
            padding-left: 20px;
        }

        ul li {
            margin-bottom: 10px;
        }

        .sect {
            background-color: gray;
            color: white;
            padding: 10px 20px;
            border: none;
            text-decoration: none;
            transition: background-color 0.3s;
            text-decoration: none;
            border-radius: 5px;
        }

        .sect:hover {
            background-color: darkgray;
            text-decoration: none;
            color: white;
        }

        @media screen and (max-width: 600px) {
            .container {
                max-width: 300px;
                margin-right: 20px;
                margin-left: 20px;
            }

            .display-4 {
                font-size: 30px;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
<?php
include('navadmin.php');
?>
    <div class="container">
        <form class="formservicios"  method="POST" enctype="multipart/form-data">
            <h1><font color="#F2DA63;" style="margin-left: 30px;">Actualizar Servicios</font></h1>
            <div class="form-group">
                <label for="numero_documento">Número de Documento:</label>
                <input type="text" id="numero_documento" name="numero_documento" class="form-control">
            </div>

            <div class="form-group">
                <label for="info_foto">Foto:</label>
                <input style="border: 2px solid orange;" class="form-control" type="file" name="info_foto">
            </div>

            <div class="form-group">
                <label for="tipo_servicio">Tipo de servicio (mantenimiento, reparación):</label>
                <select class="form-control" name="tipo_servicio" style="border: 2px solid orange;">
                    <option value="mantenimiento">Mantenimiento</option>
                    <option value="reparacion">Reparación</option>
                </select>
            </div>

            <div class="form-group">
                <label for="titulo_servicio">Nombre del servicio:</label>
                <select class="form-control" name="titulo_servicio" style="border: 2px solid orange;">
                    <option value="Fontaneria">Fontanería</option>
                    <option value="Electricidad">Electricidad</option>
                    <option value="Carpinteria">Carpintería</option>
                    <option value="Pintura">Pintura</option>
                    <option value="Albañileria">Albañilería</option>
                    <option value="Servicios generales">Servicios generales</option>
                </select>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción del servicio:</label>
                <input class="form-control" type="text" name="descripcion" placeholder="Descripción del servicio">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-warning" style="width: 150px; height: 35px; font-size: 15px;">Agregar</button>
               
            </div>
        </form>
    </div>
</body>
</html>
