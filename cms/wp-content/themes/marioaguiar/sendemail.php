<?php

$mailTo = 'info@marioaguiar.com';
$mailFrom = $_POST['emailFrom'];
$name = $_POST['nameFrom'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$company = $_POST['company'];
			
$mensaje = 'Nombre: '.$name. '\n\nCorreo: ' .$mailFrom. '\n\nCompañia: ' . $company . '\n\nMensaje:'.$message;

$headers = 'From:' . $name . '<'.$mailFrom.'>\r\nReply-To:' . $mailFrom;
$headers .= "\r\nContent-Type: text/plain";
			
mail($mailTo, $subject, $mensaje, $headers);
?>