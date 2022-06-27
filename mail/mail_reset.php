<?php
header("Content-Type: text/html;charset=utf-8");

// Varios destinatarios
$para  = $username . ', '; // atención a la coma
//$para .= 'wez@example.com';

// título
$título = 'Restablecer contrasena | Mundo Animal';
$codigo = rand(1000,9999);
//postimage.org
// mensaje
$mensaje = '
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>holi</title>
</head>
<body style="background-color: black ">
<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
	<tr>
  <center>
  <h2 style="color: #193a77; margin: 0 0 7px">Restablecer contrasena</h2>
    
		  <td style="background-color: #ecf0f1; padding: 0;">
      <a href="https://postimg.cc/QH94C9BQ" target="_blank"><img src="https://i.postimg.cc/QH94C9BQ/Mundo-Animal.png" border="0" alt="Mundo-Animal"/></a></td>
    </center>
	</tr>
	
	<tr>
		<td style="background-color: #ecf0f1">
			<div style="color: #34495e; margin: 4% 10% 2%; text-align: center;font-family: sans-serif">
      <h2 style="color: #193a77; margin: 0 0 7px">Tu codigo es:</h2>
        <h3>'.$codigo.'</h3>
        <p style="margin: 2px; font-size: 15px"><a href="http://localhost/Proyecto/view/reset.php?username='.$username.'&token='.$token.'">Para restablecer da click aqui</a>
					</p>

				<p style="margin: 2px; font-size: 15px">
					Si no realizaste esta accion omite por favor</p>
				<p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">Mundo Animal 2022</p>
			</div>
		</td>
	</tr>
</table>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
/*
// Cabeceras adicionales
$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";
*/
// Enviarlo - Asegurar que se envio el email
$enviado = false;
if (mail($para, $título, $mensaje, $cabeceras)) {
  $enviado = true;
}
?>