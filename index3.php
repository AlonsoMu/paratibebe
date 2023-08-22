<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'alonsomunoz263@gmail.com';
    $mail->Password = 'oudsbyjzolzytqhg';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('alonsomunoz263@gmail.com', 'Darce Gg');
    $mail->addAddress('alonsoredick@gmail.com', 'Alonso Redick');

    $mail->addAttachment('docs/dashboard.png', 'Dashboard.png');

    $mail->isHTML(true);
    $mail->Subject = 'Activación de cuenta';
    $mail->Body = 'Hola, <br/>Esta es una prueba desde <b>Gmail</b>.';
    $mail->send();

    echo 'Correo enviado';
} catch (Exception $e) {
    echo 'Mensaje ' . $mail->ErrorInfo;
}

// Función para generar tokens únicos (puedes implementar tu lógica personalizada)
function generateUniqueToken() {
    // Implementa aquí tu lógica para generar tokens únicos, por ejemplo, utilizando random_bytes y bin2hex.
    $token = bin2hex(random_bytes(32)); // Genera un token hexadecimal de 64 caracteres
    return $token;
}
