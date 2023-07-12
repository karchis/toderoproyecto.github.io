<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas y Respuestas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mukta:wght@800&display=swap');

        body {
            background-color: #F2DA63;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            margin: 70px auto;
            max-width: 800px;
        }

        .text {
            margin-top: 20px;
            text-align: center;
            font-family: 'Mukta', sans-serif;
        }

        /* Estilos para el menú de navegación */
        .navbar {
            background-color: #F29F05;
        }

        .navbar-logo {
            width: 90px;
            padding: 10px;
        }

        .navbar-logo img {
            width: 100%;
        }

        .navbar-buttons {
            margin-left: auto;
        }

        .navbar-buttons a {
            color: rgb(0, 0, 0);
            text-decoration: none;
            padding: 10px;
            margin-right: 10px;
        }

        .navbar-buttons a:hover {
            background-color: #F2DA63;
        }

    </style>
</head>
<body>
<?php 
include('navadmin.php');?>

<div class="container">

    <div class="row">
        <div class="col-md-10 mx-auto">
            <br><br><br>
            <h2>¿Cómo puedo gestionar las categorías de servicios disponibles en el sistema?</h2><br>
           
            <ol>
                <li>Como administrador, puede gestionar las categorías de servicios disponibles en el sistema mediante un panel de administración o una interfaz específica. Desde allí, puede agregar, modificar o eliminar categorías, así como asignar servicios específicos a cada categoría.</li>
            </ol>
            <br>
            <h2>¿Cómo puedo agregar nuevos usuarios al sistema? </h2>
            <ol>
                <li>Como administrador, tiene acceso a un panel de administración donde puede registrar nuevos usuarios manualmente. Esto incluye recopilar su información personal, como nombre, dirección de correo electrónico y contraseña, y asignarles un rol apropiado dentro del sistema.</li>
            </ol>
            <br>
            <h2>¿Cómo puedo gestionar las categorías de servicios disponibles en el sistema?</h2>
            <ol>
                <li>Como administrador, puede gestionar las categorías de servicios a través del panel de administración. Esto te permite agregar nuevas categorías, editar las existentes o eliminar aquellas que ya no sean relevantes.</li>
            </ol>
        </div>
    </div>

    <!-- Repite el mismo patrón para las demás preguntas -->

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
