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

        .navbar-buttons {
            display: flex;
            align-items: center;
            justify-content: space-between; /* Cambio de 'flex-start' a 'space-between' */
            margin-left: auto;
        }

        .navbar-buttons a {
            color: white;
            text-decoration: none;
            padding: 5px;
            margin-right: 20px;
            font-weight: normal; /* Cambio de 'bold' a 'normal' */
        }
        .navbar-buttons a:not(:last-child) {
            margin-right: 0; /* Eliminar el margen derecho */
        }
        .navbar-buttons label {
            margin-right: 10px; /* Espacio entre "Catalogo" y "Perfil" */
        }
        .navbar-buttons a:hover {
            background-color: #f2da63;
            color: #000;
        }
        .content {
            margin-top: 35px; /* Espacio para evitar que el contenido quede detrás de la navbar */
            padding: 30px;
        }

        .card {
            margin-left: 3cm;
        }

        .display-1 {
            text-align: center;
            margin-top: 6vw;
            font-size: 6vw;
            color: #F29F05;
        }

        .display-2 {
            text-align: center;
            font-size: 3.5vw;
        }

        .description {
            font-size: 1.8vw;
            text-align: center;
            margin: 0 auto;
            max-width: 720px;
        }

        .btn {
            display: block;
            margin: 3vw auto;
            background-color: #F29F05;
            border-radius: 10px;
        }

        .carousel-inner img {
            height: 40vw;
        }

        select[name="catalogo"] {
            margin-left: 10px;
        }
        
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-logo">
        <img src="img/logo.png" alt="Logo" style="height:43px; width:90px;">
        </div>
        <div class="navbar-buttons">
            <a href="iniciot.html">Inicio</a>
            <a href="proyectos.php">Proyectos</a>
            <a href="perfiltra.php">Perfil</a>
            <a href="inicion.html">Visualizar</a>
            <a href="cerrar_sesion.php">Cerrar Sesión</a>
        </div>
    </nav>
    </body>
    </html>