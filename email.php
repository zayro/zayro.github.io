<?php

extract($_REQUEST);

#cabeceras del correo
$headers = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n" ;

$headers .= 'From: gerencia@zavweb.com < gerencia@zavweb.com >'."\r\n" ;


$headers .= "Cc: $email" . "\r\n";

//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";


$mensaje_html = "
<!DOCTYPE html>
<html lang='es'>
    <head>
        <title></title>
        <meta charset='UTF-8'>
        
    </head>
    <body>
    <table border='1'>
    <thead>
    <th>nombre</th>
    <th>correo</th>
    <th>mensaje</th>
    </thead>
    <tbody>
    <td>$nombre</td>
    <td>$email</td>
    <td>$mensaje</td>
    </tbody>
    </table>
    </body>
</html>    
    ";


$correos = "zayro8905@gmail.com";

#enviando correos
if (mail($correos, "novedad zav web", $mensaje_html, $headers)) {
	
	echo 'enviado emails';
	
}
else {
	
	echo 'No enviado los email: ';
}