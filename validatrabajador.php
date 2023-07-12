<?php
$directorio = 'archivos_pdf/';

if (!is_dir($directorio)) {
    mkdir($directorio, 0777, true);
}

$archivoPDF = $_FILES['documento_verificacion'];
$nombreArchivo = $archivoPDF['name'];
$ubicacionTemporal = $archivoPDF['tmp_name'];
$ubicacionDestino = $directorio . $nombreArchivo;

if (move_uploaded_file($ubicacionTemporal, $ubicacionDestino)) {
    echo 'El archivo PDF se ha subido correctamente.';
} else {
    echo 'Ocurrió un error al subir el archivo PDF.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    $fechaActual = date('Y-m-d');
    $fechaMinima = date('Y-m-d', strtotime('-18 years'));

    if ($fecha_nacimiento > $fechaMinima) {
        echo "<script>alert('Debes tener al menos 18 años para acceder.'); window.location.href = 'logint.php';</script>";
        exit();
    }

    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $link_whatsapp = $_POST['link_whatsapp'];
    $documento_verificacion = $_FILES['documento_verificacion']['name'];

    if (empty($nombre) || empty($apellido) || empty($tipo_documento) || empty($numero_documento) || empty($fecha_nacimiento) || empty($telefono)  || empty($correo) || empty($link_whatsapp) || empty($documento_verificacion)) {
        header("Location: ");
        exit();
    } else {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "todero";

        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("SELECT * FROM tbl_trabajador WHERE numero_documento = :numero_documento");
            $stmt->bindParam(':numero_documento', $numero_documento);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "<script>alert('El número de documento ya ha sido registrado anteriormente. Por favor, ingrese un número de documento diferente.'); window.location.href = 'logint.php';</script>";
                exit();
            } else {
                $stmt = $pdo->prepare("INSERT INTO tbl_trabajador (nombre, apellido, tipo_documento, numero_documento, fecha_nacimiento, telefono, correo, link_whatsapp, documento_verificacion) 
                VALUES (:nombre, :apellido, :tipo_documento, :numero_documento, :fecha_nacimiento, :telefono, :correo, :link_whatsapp, :documento_verificacion)");

                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':apellido', $apellido);
                $stmt->bindParam(':tipo_documento', $tipo_documento);
                $stmt->bindParam(':numero_documento', $numero_documento);
                $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
                $stmt->bindParam(':telefono', $telefono);
                $stmt->bindParam(':correo', $correo);
                $stmt->bindParam(':link_whatsapp', $link_whatsapp);
                $stmt->bindParam(':documento_verificacion', $documento_verificacion);
                
                $stmt->execute();

                header("Location: mtrabajador.php?nombre=$nombre&apellido=$apellido&tipo_documento=$tipo_documento&numero_documento=$numero_documento&fecha_nacimiento=$fecha_nacimiento&telefono=$telefono&correo=$correo&link_whatsapp=$link_whatsapp&documento_verificacion=$documento_verificacion");
                exit();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

$stmt->execute();
$id_trabajador = $pdo->lastInsertId();
// Insertar el servicio en la tabla tbl_servicios
$stmt = $pdo->prepare("INSERT INTO tbl_servicios (trabajador_id, otro_campo) VALUES (:trabajador_id, :otro_campo)");
$stmt->bindParam(':trabajador_id', $id_trabajador);
$stmt->bindParam(':otro_campo', $valor_otro_campo);
$stmt->execute();

$targetDirectory = 'documentos/'; 
$targetFile = $targetDirectory . basename($_FILES['documento_verificacion']['name']);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

if (isset($_POST['submit'])) {
    $check = getimagesize($_FILES['documento_verificacion']['tmp_name']);
    if ($check !== false) {
        echo "El archivo es una imagen: " . $check['mime'] . ".";
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }
}

if (file_exists($targetFile)) {
    echo "El archivo ya existe.";
    $uploadOk = 0;
}

if ($_FILES['documento_verificacion']['size'] > 5 * 1024 * 1024) {
    echo "El archivo es demasiado grande. El tamaño máximo permitido es de 5 MB.";
    $uploadOk = 0;
}

$allowedFormats = array('jpg', 'jpeg', 'png');
if (!in_array($imageFileType, $allowedFormats)) {
    echo "Solo se permiten archivos en formato JPG, JPEG y PNG.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "El archivo no se ha subido.";
} else {
    if (move_uploaded_file($_FILES['documento_verificacion']['tmp_name'], $targetFile)) {
        echo "El archivo " . basename($_FILES['documento_verificacion']['name']) . " se ha subido correctamente.";
    } else {
        echo "Ha ocurrido un error al subir el archivo.";
    }
}
?>
