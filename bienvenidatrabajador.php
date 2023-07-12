<!--SECCION BIENVENIDA TRABAJADOR-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida a todero administrador</title>
    <style>
        body {
            background-color: #D9D9D9;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #F2DA63;
            padding: 20px;
            text-align: center;
            border-radius: 15px;
        }

        .welcome-message {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .next-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #D97904;
            color: #f2f2f2;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .next-link:hover {
            background-color: #f29f05;
        }

        @media (max-width: 768px) {
            .welcome-message {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
    <h1 class="welcome-message">¡Bienvenido(a) al Panel de servicios !</h1>
        <p>Como prestador de servicios, tienes acceso privilegiado a las funciones y herramientas de gestión de esta página. A través de este panel, podrás controlar y personalizar diversos aspectos de tu perfil para brindar la mejor experiencia a nuestros usuarios.</p>
        <a href="iniciot.html" class="next-link">Siguiente</a>
    </div>
</body>
</html>
