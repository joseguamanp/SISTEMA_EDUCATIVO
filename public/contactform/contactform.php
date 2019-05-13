<?php 
//$str = array($_POST);
//var_dump($_POST);
$nombre=$_POST['name'];
$correo=$_POST['email'];
$asunto=$_POST['subject'];
$mensaje=$_POST['message'];
/*error_reporting(0);
 
$header = 'From: ' . $correo ."\r\n"; 
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n"; 
$header .= "Mime-Version: 1.0 \r\n"; 
$header .= "Content-Type: text/plain"; 

$mensaje = "Este mensaje fue enviado por " . $nombre . " \r\n"; 
$mensaje .= "Su e-mail es: " . $correo . " \r\n"; 
$mensaje .= "Enviado el " . date('d/m/Y', time()); 

$para = 'henryedua@hotmail.com'; 

if(mail($para, $asunto, utf8_decode($mensaje), $header)){
	echo 'mensaje enviado correctamente'; 	
}else{
	echo 'mensaje no enviado'; 
}*/

	require 'PHPMailer/PHPMailerAutoload.php';	

	$miemail = 'henryedua@hotmail.com'; //aqui poner correo donde se recibirá el correo enviado desde la página
	$mipass = '123';  //contraseña de ese correo

	$mail = new PHPMailer();
	$mail->isSMTP();                            // Establecer el correo electrónico para utilizar SMTP
	//$mail->Host = 'smtp.live.com';             // Especificar el servidor de correo a utilizar 	
	$mail->SMTPAuth = true;                     // Habilitar la autenticacion con SMTP
	$mail->Username = $miemail;          // Correo electronico saliente ejemplo: tucorreo@gmail.com
	$mail->Password = $mipass; 		// Tu contraseña de gmail
	$mail->SMTPSecure = 'tls';                  // Habilitar encriptacion, `ssl` es aceptada
	//$mail->Port = 587;                          // Puerto TCP  para conectarse 
	$mail->setFrom($correo, $nombre);//Introduzca la dirección de la que debe aparecer el correo electrónico. Puede utilizar cualquier dirección que el servidor SMTP acepte como válida. El segundo parámetro opcional para esta función es el nombre que se mostrará como el remitente en lugar de la dirección de correo electrónico en sí.
	$mail->addReplyTo($correo, $nombre);//Introduzca la dirección de la que debe responder. El segundo parámetro opcional para esta función es el nombre que se mostrará para responder
	$mail->addAddress($miemail);   // Agregar quien recibe el e-mail enviado
	/*$message = file_get_contents($template);
	$message = str_replace('{{first_name}}', $mail_setFromName, $message);
	$message = str_replace('{{message}}', $txt_message, $message);
	$message = str_replace('{{customer_email}}', $mail_setFromEmail, $message);
	$mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML*/
	
	$mail->Subject = $asunto;
	$mail->Body = $mensaje;	
	//$mail->msgHTML($message);	
	
	$gmail = '/@gmail.com/i'; //pendiente revisar porque no se envian a correos de gmail
	$hotmail = '/@hotmail.com/i';
	
	if (preg_match($gmail, $correo)){
    	$mail->Host = 'smtp.gmail.com';
    	$mail->Port = 465;  
    }
    if (preg_match($hotmail, $correo)) {
    	$mail->Host = 'smtp.live.com';
    	$mail->Port = 587;  
    }
    
	if(!$mail->send()) {
		echo 'No se pudo enviar el mensaje.. Intente con otro correo';
		//echo 'Error de correo: ' . $mail->ErrorInfo;		
	} else {
		echo '¡Tu mensaje ha sido enviado!';		
	}	
?> 