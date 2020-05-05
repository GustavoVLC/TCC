<?php

date_default_timezone_set('America/Sao_Paulo');
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$nome = isset($_POST['nome']) ? $_POST['nome']: 'Não informado';
$email = isset($_POST['email']) ? $_POST['email']: 'Não informado';
$telefone = isset($_POST['telefone']) ? $_POST['telefone']: 'Não informado';
$mensagem = isset($_POST['mensagem']) ? $_POST['mensagem']: 'Não informado';
 

if($_POST['email'] && !empty($_POST['email'])  && ($_POST['mensagem'] && !empty($_POST['mensagem'])))
{
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'gustavo.rocco.01@gmail.com';
    $mail->Password = 'paimaevit2010';
    $mail->Port = 587;
    
    $mail->setFrom('gustavo.rocco.01@gmail.com');
    $mail->addAddress('gustavo.rocco.01@gmail.com');
   
    
    $mail->isHTML(true);
    $mail->Subject = 'Formulario de contato';
    $mail->Body = " Nome: {$nome}<br>Email: {$email}<br>Telefone: {$telefone}<br>Mensagem: {$mensagem}";
    $mail->AltBody = 'Chegou o email teste do Canal TI';
    
    if($mail->send()) {
        echo 'Email enviado com sucesso';
    } else {
        echo 'Email nao enviado';
    } 
}

else{
    echo"Menasgem nao enviada: Informar email e mensagem.";
}

?>