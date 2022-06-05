<?php
session_start();
$emEjecutivo = $_SESSION['PromoOpcion']['Ejecutivo']['Email'];
function enviaEmail($de, $para, $msg, $nombre, $fromName, $asun){
$msn='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head><TITLE>PromoOpcion.</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head> <body><div align="left"  style="font-size:14px"> <br> '.$msg.' </div>
<div  style="font-size:16px; font-weight:bold" ><p><a href="http://www.promoopcion.com/" target="_blank">PromoOpci&oacute;n</a></p></div>
<br> No responda a este correo electr&oacute;nico. Este buz&oacute;n no se supervisa y no recibir&aacute; respuesta. Si necesita ayuda, comun&iacute;quese con su ejecutiva de cuenta.
</body></html>';

error_reporting(E_STRICT);
date_default_timezone_set('America/Toronto');
//date_default_timezone_set(date_default_timezone_get());
$mail = new PHPMailer();
$asunto = html_entity_decode($asun);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "192.168.161.35"; // SMTP server
$mail->From       = $de;
$mail->FromName   = $fromName;
$mail->Subject    = $asunto;
$mail->IsHTML(true);

$mail->headers  = "X-Mailer: PHP/" . phpversion() . " \r\n";
$mail->headers  = "Mime-Version: 1.0 \r\n";
$mail->headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
//$mail->ClearAttachments();
//$mail->AddAttachment("images/phpmailer.gif");             // attachment
$mail->MsgHTML($msn);
$mail->AddAddress(trim($para),$nombre);
	if(!$mail->Send()) {
	  echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	  $mail->ClearAddresses();
	}
//***************************************************	
}


?>
