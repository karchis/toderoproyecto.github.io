
<!--PANEL DE ADMINISTRACION INICIOADMIN.HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <style>
        body {
        }
        .content {
            margin: 20px;
            background-color: #fff;
        }
        
        .info {
           
            padding: 40px;
            border-radius: 5px;
        }
        
        .info h2 {
            margin-top: 50px;
        }
        
        .info p {
            margin-bottom: 0;
        }
        
        .management-section {
            margin-top: 30px;
            padding: 40px;
        }
        
        .management-section h3 {
            margin-bottom: 10px;
        }
        
        .management-section ul {
            list-style-type: disc;
            margin-left: 20px;
        }
        
        .management-section li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<?php 
include('navadmin.php');
?>
    <div class="content">
        <div class="info">
        <h2>Bienvenido al Panel de Administración</h2>
            <p>Aquí encontrarás opciones para ver estadísticas, así como configurar la configuración general.</p>
        </div>

        <div class="management-section">
            <h3>Estadísticas</h3>
            <ul>
                <li><a href="estadistica_trabajadores.php">Trabajadores</a></li>
                <li><a href="estadistica_usuario.php">Usuarios</a></li>
            </ul>
        </div>
    </div>
</body>
</html>