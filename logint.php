<!--FORMULARIO DE REGISTRO DE TRABAJADORES-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login trabajador</title>
    <link rel="stylesheet" href="./estilos/logintusuarios.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
    background-color: #fff;
    padding: 20px;
    max-width: 440px;
    width: 100%;
    margin-top: 400px;
    border-radius: 15px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}
.text {
    margin-top: 20px;
    margin-top: 10px;
    text-align: center;
    font-family: 'Mukta', sans-serif;
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
    margin-right: 5px;
    width: 620px;
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
input[type="password"],
input[type="date"] {
    height: 40px;
    border: 2px solid orange;
    border-radius: 5px;
    padding: 10px;
    font-size: 16px;
    width: 100%;
    box-sizing: border-box;
    margin-bottom: 10px;
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
}
</style>
<body>

<h1 class="display-4" style="text-align:center; margin-top: 205px; margin-left:20px;"><b>Optimiza tu trabajo y mejora tu servicio</b><br>únete a todero Fusagasugá</h1>
        </div>
       <div class="container">
        <form class="formtrabajador" action="validatrabajador.php"  method="POST" enctype="multipart/form-data">
        <div class="text">
                <h2>Registro trabajador</h2>
            </div>
            <br>
            <div class="form-group">
                <input class="controls" type="text" name="nombre" placeholder="Nombres" required><br>
            </div>
            <div class="form-group">
                <input class="controls" type="text" name="apellido" placeholder="Apellidos" required><br>
            </div>
            <div class="form-group">
                <label for="tipo_documento">Tipo de documento:</label>
                <select class="controls" name="tipo_documento" type="select" id="tipo_documento" style="height: 40px;border: 2px solid orange;border-radius: 5px;padding: 10px;font-size: 16px;width: 100%;box-sizing: border-box;margin-bottom: 10px;">>
                    <option value="Cedula de ciudadania">Cedula de ciudadania</option>
                    <option value="Cedula de extranjeria">Cedula de extranjeria</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="targeta de registro migratorio">targeta de registro migratorio</option>
                </select>
            </div>
            <div class="form-group">
                <input class="controls" type="text" name="numero_documento" placeholder="Numero de documento" required><br>
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input class="controls" type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento"  required><br>
            </div>

            <div class="form-group">
                <input class="controls" type="text" name="telefono" placeholder="Telefono" required><br>
            </div>

            <div class="form-group">
                <input class="controls" type="email" name="correo" placeholder="Correo Electronico"><br>
            </div>

            <div class="form-group">
                <input class="controls" type="text" name="link_whatsapp" placeholder="Link Whatsapp" required><br>
            </div>

            <div class="form-group">
                <label for="documento_verificacion">Documentos de verificacion(foto, hoja de vida, antecedentes):</label>
                <input class="controls" type="file" name="documento_verificacion" placeholder="Documento de verificación (PDF):" required accept="application/pdf">
            </div>

            <div class="botones">
                <center><input type="submit" value="Registrar" name="Registrar" class="btn btn-warning"style="width: 125px; height:35px;"></center><br>
            </div>
        </form>
        <br><br>
    </div>
<?php include('footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</body>
</html>
