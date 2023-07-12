<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'correo/Exception.php';
require 'correo/PHPMailer.php';
require 'correo/SMTP.php';


$to = "klchavarro9@misena.com";
$subject = "Correo de prueba";
$message = "Este es un correo de prueba enviado desde PHP.";
$headers = "From: tu_direccion_de_correo@example.com";

if (mail($to, $subject, $message, $headers)) {
    echo "El correo de prueba ha sido enviado correctamente.";
} else {
    echo "Error al enviar el correo de prueba.";
}
?>

