<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./estilos/footer.css">
    <style>
         .col-md-6 {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        .col-md-5 {
            display: flex;
            justify-content: left;
            align-items: left;
            margin-left: 25px;
            margin-top: 20px;
        }
        .col-md-6 p {
            margin: 0;
        }
        .footer {
            background-color: rgb(168, 168, 168);
            padding: 2px 0;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
        .containerf {
            margin-bottom: 2px; 
         }
  
    </style>
</head>
<body>
<footer class="footer">
        <div class="containerf">
            <div class="row">
                <div class="col-md-5">
                <img src="./images/logoTod.png" alt="" style="width: 100px; height: 50px; margin-left:30px;">
                </div>
                <div class="col-md-6">
                    <ul class="list-inline text-right">
                        <li class="list-inline-item"><p><b>Correo: proyectotodero@gmail.com</b></p></li>
                        <li class="list-inline-item"><p><b>Telefono: 3027303212</b></p></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
