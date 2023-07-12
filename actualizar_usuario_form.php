<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos/actualizar_usuarios_form.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
<?php
include('navadmin.php');
 ?>
<div class="container">
        <form class="form-register"  action="" method="POST" enctype="multipart/form-data">
            <div class="text">
                <h2 style="text-align:center">Registro</h2><br>
            </div>
            <div class="form-group">
                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario"><br>
            </div>
            <div class="form-group">
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres"><br>
            </div>
            <div class="form-group">
                <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos"><br>
            </div>
            <div class="form-group">
                <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo electrónico"><br>
            </div>
            <div class="form-group">
                <input type="password" name="contrasenia" id="contrasenia" class="form-control"
                    placeholder="Contraseña">
            </div>
            <div class="form-group">
                <label for="rol">Rol:</label>
                <select name="rol" class="form-control" style="border: 2px solid orange;">
                    <option value="administrador">Administrador</option>
                    <option value="trabajador">Trabajador</option>
                    <option value="usuario">Usuario</option>
                </select>
            </div>
            <div class="botones">
                <center><input type="submit" value="Registrar" name="Registrar" class="btn btn-warning"></center>
            </div>
        </form>
    </div>
</body>
</html>