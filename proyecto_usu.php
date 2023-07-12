<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./estilos/proyecto_usu.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Botón y formulario</title>
    <style>
        #formulario {
            display: none;
        }
        .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 
    }
    </style>
    <script>
        function mostrarFormulario() {
            document.getElementById('formulario').style.display = 'block';
        }
    </script>
</head>
<body>
<br><br><br><br>
<center><button class="btn btn-warning rounded-pill px-4 py-2" onclick="mostrarFormulario()" style="font-size: 15px; border-radius: 5px;">Proyecto terminado</button></center>

    <div id="formulario">
    <?php include('nav.php');?>
        <div class="container">
            <div class="form">
                <form action="" method="POST">
                    <label for="calificacion">Calificación:</label>
                
                    <div class="rating">
                        <input type="radio" id="star5" name="calificacion" value="5" required>
                        <label for="star5"></label>
                        <input type="radio" id="star4" name="calificacion" value="4" required>
                        <label for="star4"></label>  
                        <input type="radio" id="star3" name="calificacion" value="3" required>
                        <label for="star3"></label>
                        <input type="radio" id="star2" name="calificacion" value="2" required>
                        <label for="star2"></label>
                        <input type="radio" id="star1" name="calificacion" value="1" required>
                        <label for="star1"></label>
                    </div>
                    <div class="comment-input">
                        <label for="comentario">Comentario:</label>
                        <textarea name="comentario" id="comentario" rows="4" cols="50" required></textarea>
                        <button type="submit">Enviar</button>  
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $calificacion = $_POST['calificacion'];
            $comentario = $_POST['comentario'];

            if (!empty($calificacion) && !empty($comentario)) {
                $servidor = "localhost";
                $db = "todero";
                $usuario = "root";
                $contrasenia = "";
                
                try {
                    $conexion = new PDO("mysql:host=$servidor;dbname=$db", $usuario, $contrasenia);
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $error) {
                    echo $error->getMessage();
                    exit();
                }

                
                echo '<script>window.location.href = "agradecimiento.php";</script>';
            } else {
                echo "<p>Por favor, completa todos los campos del formulario.</p>";
            }
        }
    ?>
</body>
</html>
