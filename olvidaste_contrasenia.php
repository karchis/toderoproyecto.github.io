<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
        crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mukta:wght@800&display=swap');

        body {
            background-color: #d9d9d9;
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
        .formrecuperar input[type="email"] {
            border-radius: 5px;
            font-size: 15px;
            border: 2px solid orange;
            width: 260px;
            margin-top: 1px;
        }

        .formrecuperar input[type="password"] {
            border-radius: 5px;
            font-size: 15px;
            border: 2px solid orange;
            width: 260px;
        }

        .form-group {
            margin-left: 50px;
        }

        .text {
            text-align: center;
            justify-content: center;
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
            width: 120px;
            justify-content: center;
        }

        .btn-warning:hover {
            color: #fff;
        }

        .button-container {
            display: flex;
            justify-content: center;
        }
        .col-md-6 {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 7px;
            font-size: 14px;
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
         
        .password-input {
            position: relative;
        }

        .password-visibility-button {
            position: absolute;
            top: 50%;
            right: 10px;
            margin-right:40px;
            transform: translateY(-50%);
            background-color: transparent;
            border: none;
            cursor: pointer;
            color: orange;
        }

        .password-visibility-button:focus {
            outline: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <form class="formrecuperar" action="validarecuperacion.php" method="POST">
            <div class="text">
                <h4>¿Olvidó su contraseña?</h4>
            </div>
            <br>
            <center><p>Por favor ingrese su correo electrónico y una nueva contraseña</p></center>
            <div class="form-group">
                <label for="correo">Correo electronico:</label>
                <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo electrónico"
                    required>
            </div>
            <br>
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
                <input type="submit" value="Recuperar" name="Registrar" class="btn btn-warning">
            </div>
        </form>
    </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
