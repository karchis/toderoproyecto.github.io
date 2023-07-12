<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="../styles.css">
    <style>@import url('https://fonts.googleapis.com/css2?family=Mukta:wght@800&display=swap');</style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            background-color: #d9d9d9;
            margin: 0;
        }

        .navbar {
            background-color: #f29f05;
            display: flex;
            align-items: center;
            padding: 10px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999;
        }

        .navbar-logo {
            width: 4cm;
        }

        .navbar-logo img {
            width: 100%;
        }

        .navbar-buttons {
            display: flex;
            align-items: center;
            justify-content: space-between; 
            margin-left: auto;
        }

        .navbar-buttons a {
            color: white;
            text-decoration: none;
            padding: 5px;
            margin-right: 20px;
            font-weight: normal; 
        }
        .navbar-buttons a:not(:last-child) {
            margin-right: 0; 
        }
        .navbar-buttons label {
            margin-right: 10px;
        }
        .navbar-buttons a:hover {
            background-color: #f2da63;
            color: #000;
        }
        .btn {
            display: block;
            margin: 30px auto;
            background-color: #f29f05;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<nav class="navbar">
<nav class="navbar">
        <div class="navbar-logo">
            <img src="uploads/logo todero sin fondo.png" alt="Logo" style="height:43px; width:90px;">
        </div>
        <div class="navbar-buttons">
            <a href="inicioadmin.html">Inicio</a>
            <a href="contenido.php">Contenido</a>
            <a href="estadisticas.php">Estadísticas</a>
            <a href="soporte.php">Soporte</a>
            <a href="cerrar_sesion.php">Cerrar Sesión</a>
        </div>
    </nav>
    </nav>
    </body>
</html>