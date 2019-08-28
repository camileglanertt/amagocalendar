<?php   
// Inclui o arquivo class.phpmailer.php localizado na mesma pasta do arquivo php 
include "../packages/PHPMailer-master/PHPMailerAutoload.php"; 

// Inicia a classe PHPMailer 
$mail = new PHPMailer(); 
 
// Método de envio 
$mail->IsSMTP(); 
 
// Enviar por SMTP 
$mail->Host = "smtp.gmail.com"; 
 
//  endereço de SMTP do provedor 
$mail->Port = 25; 
 
// Usar autenticação SMTP
$mail->SMTPAuth = true; 

$mail->Username = 'contato.amagocalendar@gmail.com'; 
$mail->Password = 'amago123'; 
 
// Configurações de compatibilidade para autenticação em TLS 
$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) ); 
 
//mostra erro
//$mail->SMTPDebug = 2; 
 
// Define o remetente 
$mail->From = "contato.amagocalendar@gmail.com";  
$mail->FromName = "Agendamento"; 
 
// Define o(s) destinatário(s) 

$mail->AddAddress($_GET['email']);

// Opcionais: CC e BCC
// $mail->AddCC('joana@provedor.com', 'Joana'); 
// $mail->AddBCC('roberto@gmail.com', 'Roberto'); 
 
$mail->IsHTML(true);  
$mail->CharSet = 'UTF-8'; 
 
// Assunto da mensagem 
$mail->Subject = "Agendamento"; 

$corpo = $_GET['mensagem'];

// Corpo do email 
$mail->Body = $corpo; 

// Anexos 
// $mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf"); 

// Envia o e-mail 
$enviado = $mail->Send(); 
header ('Location: ../calendario.php')

?>