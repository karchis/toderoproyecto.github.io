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
    
    $
$tipo_documento = $_POST["tipo_documento"];
    
    $
$numero_documento = $_POST["numero_documento"];
    
    $

   
$fecha_nacimiento = $_POST["fecha_nacimiento"];
    
    $

   
$telefono = $_POST["telefono"];
    
    $
$correo = $_POST["correo"];
    
    $
$link_whatsapp = $_POST["link_whatsapp"];
    
    $

   
$documento_verificacion = $_FILES["documento_verificacion"]["name"];

    

   


// Validate the form fields here (e.g., check for empty fields, validate email format, etc.)

    

   


// Insert the data into the database
    
    $

   
$query = "INSERT INTO tbl_trabajador (nombre, apellido, tipo_documento, numero_documento, fecha_nacimiento, telefono, correo, link_whatsapp, documento_verificacion) 
              VALUES ('$nombre', '$apellido', '$tipo_documento', '$numero_documento', '$fecha_nacimiento', '$telefono', '$correo', '$link_whatsapp', '$documento_verificacion')";

    

   
if (mysqli_query($conn, $query)) {
       header('location:gestiontrabajadores.php');
        
       
echo "Registro exitoso";
    } else {
        // Error occurred while inserting data
        echo "Error: " . mysqli_error($conn);
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
</head>
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
            max-width: 500px;
            width: 100%;
            border-radius: 15px;
            margin-top: 480px;
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
<body>
<?php
include('navtrabajador.php');
?>

    <form method="POST" action="">
    <div class="container">
        <form class="formtrabajador" action="validatrabajador.php"  method="POST" enctype="multipart/form-data">
            <center><h1 class="titulo" <font color="#F2DA63;">Añadir trabajador</font></h1></center>
            <br>
            <div class="form-group">
                <label for="nombre">Nombres:</label>
                <input class="controls" type="text" name="nombre" placeholder="Nombres"><br><br>
            </div>
            <div class="form-group">
                <label for="apellido">Apellidos:</label>
                <input class="controls" type="text" name="apellido" placeholder="Apellidos" ><br><br>
            </div>
            <div class="form-group">
                <label for="tipo_documento">Tipo de documento:</label>
                <select class="controls" name="tipo_documento" type="select" id="tipo_documento" style="border: 2px solid orange;">
                    <option value="DNI">DNI</option>
                    <option value="Cedula de ciudadania">Cedula de ciudadania</option>
                    <option value="Cedula de extranjeria">Cedula de extranjeria</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="numero_documento">Numero de documento:</label>
                <input class="controls" type="text" name="numero_documento" placeholder="Numero de documento" ><br><br>
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input class="controls" type="date" name="fecha_nacimiento"><br><br>
            </div>

            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input class="controls" type="text" name="telefono" placeholder="Telefono" ><br><br>
            </div>

            <div class="form-group">
                <label for="correo">Correo:</label>
                <input class="controls" type="email" name="correo" placeholder="Correo Electronico" ><br><br>
            </div>

            <div class="form-group">
                <label for="link_whatsapp">Enlace de WhatsApp:</label>
                <input class="controls" type="text" name="link_whatsapp" placeholder="Link Whatsapp"><br><br>
            </div>

            <div class="form-group">
                <label for="documento_verificacion">Documento de verificación (PDF):</label>
                <input class="controls" type="file" name="documento_verificacion"  accept="application/pdf">
            </div>
        
        <button class="btn btn-warning" type="submit" value="Actualizar">Actualizar</button>
    </form>
</body>
</html>
