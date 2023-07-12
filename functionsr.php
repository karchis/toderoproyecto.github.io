<?php 
include('validar_info_servicio.php');
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Información del Trabajador y Servicio</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mukta:wght@800&display=swap');

        body {
            background-color: #d9d9d9;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            height: 100vh;
            flex-direction: row;
        }

        .card {
            background-color: #f5f5f5;
            padding: 20px;
            margin: 10px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 500px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .card h2 {
            color: #333;
            margin-top: 0;
        }

        .card p {
            color: #666;
            margin-bottom: 10px;
        }

        .info_trabajador {
            text-align: left;
        }

        .text {
            margin-top: 20px;
            text-align: center;
        }

        input[type="text"] {
            height: 30px;
            border: 2px solid orange;
        }

        input[type="password"] {
            height: 30px;
            border: 2px solid orange;
        }

        input[type="number"] {
            height: 30px;
            border: 2px solid orange;
        }

        input[type="date"] {
            height: 30px;
            border: 2px solid orange;
        }

        .form-control {
            border-color: #F2DA63;
        }

        .button-container {
            text-align: center;
        }

        .form-container {
            margin-right: 120px;
        }
    </style>
</head>
<body>
    <?php include('nav.php'); ?>
    <br><br>

    <div class="container">
        <div class="card">
            <br>
            <h2>Información del Servicio</h2><br>
            <p>Nombre del Servicio: <?php echo $trabajador['titulo_servicio']; ?></p><br>
            <img src="<?php echo $trabajador['foto']; ?>" alt="Imagen del servicio" style="width: 350px; display: block; margin: 0 auto; border-radius: 5px; padding: 5px; margin-bottom: 10px;"><br>
            <p>Descripción: <?php echo $trabajador['descripcion']; ?></p>
            <br>
            <div class="info_trabajador">
                <p><b>Información del Trabajador</b></p>
                <p><b>Nombre: </b><?php echo $trabajador['nombre']; ?>&nbsp;<?php echo $trabajador['apellido']; ?></p>
                <p><b>Teléfono: </b><?php echo $trabajador['telefono']; ?></p>
                <p><b>Correo: </b><?php echo $trabajador['correo']; ?></p>
                <p><b>Link WhatsApp: </b><?php echo $trabajador['link_whatsapp']; ?></p>
            </div>
            <a href="age.php" class="btn btn-warning" style="color:#fff;">Agendar</a>
        </div>
    </div>
    <div class="message"style="justify-content:right;text-align:right; margin-right:70px; margin-top:-300px; margin-left:580px;">
            <center><h2><b>¡Descubre nuestro increíble servicio!</b></h2>
            <h3>Nuestro equipo de profesionales altamente capacitados está listo para brindarte una experiencia excepcional.</h3></center>
    </div>
</body>
</html>

