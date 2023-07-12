<?php
$carpeta = 'uploads';
$ruta = dirname(__FILE__) . '/' . $carpeta;

if (!file_exists($ruta)) {
    if (mkdir($ruta, 0777, true)) {
        echo 'Carpeta creada exitosamente.';
    } else {
        echo 'Error al crear la carpeta.';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero_documento = isset($_POST['numero_documento']) ? $_POST['numero_documento'] : "";
    $tipo_servicio = isset($_POST['tipo_servicio']) ? $_POST['tipo_servicio'] : "";
    $titulo_servicio = isset($_POST['titulo_servicio']) ? $_POST['titulo_servicio'] : "";
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";

    $foto = isset($_FILES['info_foto']['name']) ? $_FILES['info_foto']['name'] : "";
    $foto_temp = isset($_FILES['info_foto']['tmp_name']) ? $_FILES['info_foto']['tmp_name'] : "";

    if (!empty($foto_temp)) {
        $info_foto = "uploads/" . $foto;

        if (move_uploaded_file($foto_temp, $info_foto)) {
            // Archivo subido correctamente
            echo "Archivo subido correctamente.";

            $servidor = "localhost";
            $db = "todero";
            $usuario = "root";
            $contrasenia = "";

            try {
                $conexion = new PDO("mysql:host=$servidor;dbname=$db", $usuario, $contrasenia);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                

                $sql = "SELECT trabajador_id FROM tbl_trabajador WHERE numero_documento = :numero_documento";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(":numero_documento", $numero_documento);
                $sentencia->execute();

                if ($sentencia->rowCount() > 0) {
                    $row = $sentencia->fetch(PDO::FETCH_ASSOC);
                    $trabajador_id = $row['trabajador_id'];

                    
                    $acceso_permitido = true; 

                    if ($acceso_permitido) {
                        $sentencia = $conexion->prepare("INSERT INTO tbl_servicios (numero_documento, foto, tipo_servicio, titulo_servicio, descripcion) VALUES (:numero_documento, :foto, :tipo_servicio, :titulo_servicio, :descripcion)");
                            $sentencia->bindParam(":numero_documento", $numero_documento);
                            $sentencia->bindParam(":foto", $info_foto);
                            $sentencia->bindParam(":tipo_servicio", $tipo_servicio);
                            $sentencia->bindParam(":titulo_servicio", $titulo_servicio);
                            $sentencia->bindParam(":descripcion", $descripcion);


                        if ($sentencia->execute()) {
                            $ultimo_id = $conexion->lastInsertId();

                            if ($tipo_servicio == "mantenimiento") {
                                header("Location: mantenimiento.php?id=$ultimo_id&mensaje=Archivo subido correctamente.");
                                exit();
                            } elseif ($tipo_servicio == "reparacion") {
                                header("Location: reparacion.php?id=$ultimo_id&mensaje=Archivo subido correctamente.");
                            
                                exit();
                            } else {
                                header("Location: otra_pagina.php?id=$ultimo_id&mensaje=Archivo subido correctamente.");
                                exit();
                            }
                        } else {
                            echo "Error al insertar el registro en la base de datos.";
                            echo "<script>alert('Error al insertar el registro de la base de datos.'); window.location.href = 'crear.php';</script>";
                        }
                    } else {
                        echo "Acceso no permitido para el número de documento ingresado.";
                        echo "<script>alert('Acceso no permitido para el número de documento ingresado.'); window.location.href = 'crear.php';</script>";
                    }
                } else {
                    echo "No se encontró ningún trabajador con el número de documento ingresado.";
                    echo "<script>alert('No se encontró ningún trabajador con el número de documento ingresado.'); window.location.href = 'crear.php';</script>";
                }
            } catch (PDOException $error) {
                echo "Error al conectar a la base de datos: " . $error->getMessage();
            }
        } else {
            echo "Error al mover el archivo.";
        }
    } else {
        echo "No se seleccionó ningún archivo.";
        echo "<script>alert('No se selecciono ningun archivo.'); window.location.href = 'crear.php';</script>";
    }
}

?>
