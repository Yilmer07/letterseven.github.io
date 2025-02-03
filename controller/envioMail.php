<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../controller/PHPMailer/Exception.php';
require '../controller/PHPMailer/PHPMailer.php';
require '../controller/PHPMailer/SMTP.php';

//El contact debe tener la propiedad name, sino generara error
$nombre =  $_POST['nombre'];
$email =   'yilmer.chaponan93@gmail.com';
$mensaje = 'La carta fue leída.';

/*Cuerpo del Correo*/
$contenido = <<< HTML
    <h1><strong>Te notificamos que</strong></h1>
    <p><strong>Mensaje:</strong> $mensaje.</p>
HTML;

$headers = "MIME-Version: 1.0 \r\n";
$headers .= "Content-type: text/html; \r\n";
//Create an instance; passing `true` enables exceptions
$mailer = new PHPMailer(true);

try {
    //Recipients
    $mailer->setFrom($email, $nombre);// ¿De quein llegara?
    $mailer->addAddress('yilmer.chaponan93@gmail.com', 'Yilmer Ch');
    //Content
    $mailer->isHTML(true);                                  //Set email format to HTML
    $mailer->Subject = 'Carta Diana';
    //$mailer->Body    = $contenido;
    $mailer->CharSet = 'UTF-8';
    $mailer->msgHTML($contenido);
    $mailer->altBody = strip_tags($contenido);
    //
    $mailer->send();
        echo json_encode('success');
    } catch (Exception $e) {
        echo json_encode("El mensaje no pudo ser enviado: Error: {$mailer->ErrorInfo}");
    }

?>
