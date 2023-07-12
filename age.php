<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Servicio</title>
    <link rel="stylesheet" href="./estilos/age.css">
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            margin-top:240px;
            max-width: 600px;
            width: 450px;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        input[type="number"] {
            height: 40px;
            border: 2px solid orange;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
        }


    </style>
</head>
<body>
<?php
include('nav.php');
 ?>
    <div class="container">
        <div class="form-container">
            <form class="form-register" action="validaragenda.php"  method="POST">
                <h2>Agendar Servicio</h2><br>

                <div class="form-group">
                    <label for="correo">Correo:</label>
                    <input type="text" name="correo" id="correo" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="number" name="telefono" id="telefono" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="disponibilidad">Disponibilidad del servicio:</label>
                    <select name="disponibilidad" class="form-control" required>
                        <option value="default" disabled selected>Seleccione la disponibilidad de su servicio:</option>
                        <option value="Urgente">Urgente</option>
                        <option value="Programada">Programada</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" class="form-control textarea-orange" required style="border: 2px solid orange;"></textarea>
                </div>

                
                <center><input type="submit" value="Agendar" name="Agendar" class="btn btn-warning btn-submit"></center>

                
            </form>
        </div>
    </div>
</body>
</html>

