<?php
require "../vendor/autoload.php";
$output = 'Пользователь '.$_POST['name'].' оставил сообщение:<br/>';
$output.= "<p>".$_POST['content'].'</p><br/>';
$output.= "E-mail отправителя: ".$_POST['email'];


$mail = new PHPMailer;

$mail->IsSMTP();
$mail->SMTPAuth   = true;
$mail->Host       = "smtp.yandex.ru";
$mail->Username   = "mironchikov1991@yandex.ru";
$mail->Password ='386met78';
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('mironchikov1991@yandex.ru', 'E-mail с сайта');
$mail->addAddress('webmaster.1991@mail.ru', 'Получатель');     // Add a recipient
$mail->addCC($_POST['email'], $_POST['name']);
$mail->addReplyTo('mironchikov1991@yandex.ru', 'Robot');
$mail->CharSet = 'UTF-8';
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Письмо с сайта '.date('d.m.Y H:i:s',time());
$mail->Body    = $output;
$mail->AltBody = $output;

$mail->Send();

var_dump($_POST);