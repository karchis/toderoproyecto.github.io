<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./estilos/registro.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
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
            max-width: 420px;
            width: 100%;
            border-radius: 15px;
            margin-right: 90px;
            margin-top: 300px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
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
    </style>
</head>

<body>
    <h1 class="display-4"><br><br><br>Con nuestro sistema web, <br><b>¡tu inmueble siempre en buen estado!</b></h1>
    <div class="container">
        <form class="form-register" action="validaregistro.php" method="POST">
            <div class="text">
                <h2>Registro</h2><br>
            </div>

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
                    <option value="trabajador">Trabajador</option>
                    <option value="usuario">Usuario</option>
                </select>
            </div>
            <div class="botones">
                <center><input type="submit" value="Registrar" name="Registrar" class="btn btn-warning"
                        style="width: 125px; height:35px;"></center><br>
            </div>
            <br><br><br>
        </form>
    </div>

    <?php include('footer.php');?>
    <script>
        document.getElementById("aceptarTerminos").addEventListener("click", function() {
            if (this.checked) {
                const termsText = document.querySelector('.terms').innerText;
                alert(termsText);
            }
        });
    </script>

</body>
</html>