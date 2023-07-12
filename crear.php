<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Servicio</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="../styles.css">
    <style>@import url('https://fonts.googleapis.com/css2?family=Mukta:wght@800&display=swap');</style>
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            margin-top:200px;
        }
        .formservicios {
            margin: 0;
            max-width: 500px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top:20px;
        }
        .descripcion {
            height: 100px;
            width: 100%; 
            resize: none; 
        }
        .formservicios input[type="text"],
        .formservicios select {
            border: 2px solid orange;
            border-radius: 5px;
            padding: 3px;
            margin-bottom: 8px;
        }
        .formservicios input[type="text"]:focus,
        .formservicios select:focus {
            border-color: 2px solid orange;
            box-shadow: 0 0 5px blue;
            outline: none;
        }
        @media screen and (max-width: 768px) {
            .formservicios {
                max-width: 90%;
            }
        }
    </style>
</head>
<body>
<?php
include('navtrabajador.php');
?>
<br><br>
    <div class="container">
        <form class="formservicios" action="validarservicio.php" method="POST" enctype="multipart/form-data">
           <br> <h1 style="margin-left: 10px;">Registrar Servicios</h1>
      
            <label for="numero_documento">Número de Documento:</label>
            <input type="text" id="numero_documento" name="numero_documento" required><br>
            <br>

            <label for="info_foto">Foto:</label>
            <input class="controls" type="file" name="info_foto" required><br>

            <label for="tipo_servicio">Tipo de servicio (mantenimiento, reparación):</label><br>
            <select class="controls" name="tipo_servicio" required>
                <option value="mantenimiento">Mantenimiento</option>
                <option value="reparacion">Reparación</option>
            </select><br>

            <br><label for="nombre_servicio">Nombre del servicio:</label><br>
            <select class="controls" name="titulo_servicio" required>
                <option value="Fontaneria">Fontanería</option>
                <option value="Electricidad">Electricidad</option>
                <option value="Carpinteria">Carpintería</option>
                <option value="Pintura">Pintura</option>
                <option value="Albañileria">Albañilería</option>
                <option value="Servicios generales">Servicios generales</option>
            </select><br>
            <br>
            <div class="form-group">
                <textarea name="descripcion" id="descripcion" class="form-control descripcion" placeholder="Descripción" required style="border: 2px solid orange;"></textarea>
            </div>

            <br>

            <div style="text-align: center;">
                <button type="submit" class="btn btn-warning" style="width: 200px; height: 35px; font-size: 15px;">Agregar</button>
            </div>
        </form>
    </div>
    <script>
        var descripcionTextArea = document.getElementById('descripcion');

        descripcionTextArea.style.height = descripcionTextArea.scrollHeight + 'px';

        descripcionTextArea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    </script>
</body>
</html>
