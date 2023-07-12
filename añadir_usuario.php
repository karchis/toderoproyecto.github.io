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
$usuario = $_POST["usuario"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$contrasenia = $_POST["contrasenia"];
$rol = $_POST["rol"];

    

   
$query = "INSERT INTO tbl_registro (usuario, nombre, apellido, correo, contrasenia, rol) 
VALUES ('$usuario','$nombre', '$apellido', '$correo', '$contrasenia', '$rol')";

    

   
if (mysqli_query($conn, $query)) {
       header('location:gestionarusuarios.php');
        
       
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
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
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
        input[type="password"] {
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
        <form class="form-register"  method="POST">
            <h1 class="titulo" style="color: #F29F05; text-align: center;">Registro</h1><br>
            <div class="form-group">
                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" required><br>
            </div>
            <div class="form-group">
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres" required><br>
            </div>
            <div class="form-group">
                <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos" required><br>
            </div>
            <div class="form-group">
                <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo electrónico" required><br>
            </div>
            <div class="form-group">
                <input type="password" name="contrasenia" id="contrasenia" class="form-control"
                    placeholder="Contraseña" required>
            </div>
            <div class="form-group">
                <label for="rol">Rol:</label>
                <select name="rol" class="form-control" style="border: 2px solid orange; height:30px; font-size:12px;">
                    <option value="administrador">Administrador</option>
                    <option value="trabajador">Trabajador</option>
                    <option value="usuario">Usuario</option>
                </select>
            </div>
            <div class="botones">
                <center><input type="submit" value="Registrar" name="Registrar" class="btn btn-warning"
                        style="width: 125px; height:35px;"></center><br>
            </div>
        </form>
    </div>
    <script src="terminos.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
