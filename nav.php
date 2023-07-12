<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="../styles.css">
    <style>@import url('https://fonts.googleapis.com/css2?family=Mukta:wght@800&display=swap');</style>
    <style>
        body {
            background-color: #d9d9d9;
            margin: 0;
        }

        .navbar {
            background-color: #F29F05;
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
            margin-right: auto;
        }

        .navbar-logo img {
            height: 43px;
            width: 90px;
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
            margin-right: 10px;
        }

        .navbar-buttons label {
            margin-right: 10px;
        }

        .navbar-buttons a:hover {
            background-color: #f2da63;
            color: #000;
        }

        select[name="catalogo"] {
            margin-left: 10px;
            background-color: #F29F05;
            color: #fff;
            border: none;
        }

        select[name="catalogo"]:hover {
            background-color: #f2da63;
            color: #000;
        }

        @media (max-width: 768px) {
            .navbar-buttons {
                flex-direction: column;
                align-items: flex-start;
                margin-left: 0;
            }

            .navbar-buttons a:not(:last-child) {
                margin-right: 0;
                margin-bottom: 10px;
            }

            select[name="catalogo"] {
                margin-left: 0;
                margin-top: 10px;
            }
        }
    </style>
    <script>
        function redirectToPage(value) {
            if (value !== 'default') {
                window.location.href = value;
            }
        }
    </script>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-logo">
            <img src="img/logo.png" alt="Logo">
        </div>
        <div class="navbar-buttons">
            <a href="inicion.html">Inicio</a>
            <select name="catalogo" required onchange="redirectToPage(this.value)">
                <option value="default" disabled selected>Servicios</option>
                <option value="mantenimiento.php">Mantenimiento</option>
                <option value="reparacion.php">Reparación</option>
            </select>
            <div>
                <a href="logint_usuarios.php">Busco trabajo</a>
                <a href="proyecto_usu.php">Calificar</a>
                <a href="preguntasfrecuentes.php">Preguntas frecuentes</a>
                <a href="cerrar_sesion.php">Cerrar Sesión</a>
            </div>
        </div>
    </nav>
</body>
</html>
