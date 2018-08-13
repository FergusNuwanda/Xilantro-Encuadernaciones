<?php 

$nombre=$_POST['nombre'];
$email=$_POST['email'];
$mensaje=$_POST['mensaje'];

$destinatario="mfernandezarg@gmail.com";
$asunto="Nuevo mensaje desde el sitio";
$msj="Nombre: ".$nombre."<br>".
     "Email: ".$email."<br>".
     "Mensaje: ".$mensaje;


$cabeceras = 'MIME-version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$cabeceras .= 'From: '.$nombre.' <'.$email.'>' . "\r\n";

$envio=mail($destinatario,$asunto,$msj,$cabeceras);
if($envio==true){
          echo "Gracias por tu mensaje! Ha sido enviado.";
        }else {
          echo "Ups! Hubo un problema con el envío. Intente nuevamente.";
        }

?>