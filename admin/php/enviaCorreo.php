<?php


require('../libmail/class.phpmailer.php');
require('../libmail/class.smtp.php');

$mail = new PHPMailer();

$body =  $_POST['sendermessage'];;

$mail->IsSMTP(); 

// la dirección del servidor, p. ej.: smtp.servidor.com
$mail->Host = "hades.e-novanet.mx";

// dirección remitente, p. ej.: no-responder@miempresa.com
$mail->From = "victor@bluecloud.com.mx";

// nombre remitente, p. ej.: "Servicio de envío automático"
$mail->FromName = "Correo nuevo enviado desde la pagina";

// asunto y cuerpo alternativo del mensaje
$mail->Subject = $_POST['sendersubject'];
$mail->AltBody = "Cuerpo alternativo 
    para cuando el visor no puede leer HTML en el cuerpo"; 

// si el cuerpo del mensaje es HTML
$mail->MsgHTML($body);

// podemos hacer varios AddAdress
$mail->AddAddress($_POST['emailaddress'], $_POST['nombre']);

// si el SMTP necesita autenticación
$mail->SMTPAuth = true;

// credenciales usuario
$mail->Username = "victor@bluecloud.com.mx";
$mail->Password = "victor1990"; 

if(!$mail->Send()) {
echo "Error enviando:" . $mail->ErrorInfo;
} else {
echo "¡¡Enviado!!";
}


?>