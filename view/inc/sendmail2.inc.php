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
$mail->FromName = "Nova senha"; 
 
// Define o(s) destinatário(s) 

$mail->AddAddress($_GET['email']);

// Opcionais: CC e BCC
// $mail->AddCC('joana@provedor.com', 'Joana'); 
// $mail->AddBCC('roberto@gmail.com', 'Roberto'); 
 
$mail->IsHTML(true);  
$mail->CharSet = 'UTF-8'; 
 
// Assunto da mensagem 
$mail->Subject = "Agendamento"; 

$corpo = "Sua nova senha é: ".$_GET['nome']."123<br>Você pode alterá-la na aba Configurações > Senha da sua conta";

// Corpo do email 
$mail->Body = $corpo; 

// Anexos 
// $mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf"); 

// Envia o e-mail 
$enviado = $mail->Send();
if($enviado){
    include_once "../../autoload.php";
    $controleAvaliacao = new ControleUAvaliacao();
    //Passa o POST desta View para o Controle
    $controleAvaliacao->setVisao($_GET);
    //insere novo atendimento
    $resultado =  $controleAvaliacao->controleAcao("alterar");
} 
header ('Location: login.php');

?>