<?php

session_start();


if (isset($_POST['submit'])) {
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "todero";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM tbl_registro WHERE usuario = '$usuario' AND contrasenia = '$contrasenia'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();

        $_SESSION['usuario_id'] = $fila['ID'];
        $_SESSION['nombre'] = $fila['nombre'];
        $_SESSION['apellido'] = $fila['apellido'];
        // .
        header('Location: perfil.php');
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./estilos/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    
    <style>
        body{
            background-color: #d9d9d9;
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
            width:120px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            max-width: 400px;
            width: 100%;
            margin-top: 30px;
            border-radius: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .btn-warning:hover {
            background-color: #FFA000;
        }
        .col-md-6 {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        .col-md-5 {
            display: flex;
            justify-content: left;
            align-items: left;
            margin-left: 25px;
            margin-top: 20px;
        }
        .col-md-6 p {
            margin: 0;
        }
        .footer {
            background-color: rgb(168, 168, 168);
            padding: 2px 0;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
        .containerf {
            margin-bottom: 2px; 
         }
  
    </style>
</head>
<body>
    <div class="container">
        <form class="form-register" action="validarlogin.php" method="POST">
            <div class="text">
                <h2>Iniciar Sesión</h2>
            </div>

            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingrese su usuario" required>
            </div>

        <div class="form-group">
            <label for="contrasenia">Contraseña:</label>
            <div class="password-input">
            <input type="password" name="contrasenia" id="contrasenia" class="form-control" placeholder="Ingrese su contraseña" required>
            <button type="button" id="passwordVisibilityButton" class="password-visibility-button" onclick="togglePasswordVisibility()">
            <i class="fas fa-eye"></i>
            </button>
        </div>
</div>
    <div class="button-container">
        <input type="submit" value="Ingresar" class="btn btn-warning">
        <a  href="registro.php" class="btn btn-warning">Registrarme</a>
    </div>

            <div class="text">
            <a class="sect" href="logint.php" style="color:#000; text-decoration:none">Busco trabajo</a><br>
                <a href="olvidaste_contrasenia.php" class="sec">Olvidé mi contraseña</a>
                
            </div>
        </form>
    </div>
    <br>
    <footer class="footer">
        <div class="containerf">
            <div class="row">
                <div class="col-md-5">
                    <img src="./images/logoTod.png" alt="" style="width: 100px; height: 50px; margin-left:30px;">
                </div>
                <div class="col-md-6">
                    <ul class="list-inline text-right">
                        <li class="list-inline-item"><p><b>Correo: proyectotodero@gmail.com</b></p></li>
                        <li class="list-inline-item"><p><b>Telefono: 3027303212</b></p></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script>
        function togglePasswordVisibility() {
    var passwordInput = document.getElementById("contrasenia");
    var passwordVisibilityButton = document.getElementById("passwordVisibilityButton");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordVisibilityButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
    } else {
        passwordInput.type = "password";
        passwordVisibilityButton.innerHTML = '<i class="fas fa-eye"></i>';
    }
}
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7og..."></script>
</body>
</html>
