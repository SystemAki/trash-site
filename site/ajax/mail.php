<?php

$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_STRING));
$message = trim(filter_var($_POST['message'], FILTER_SANITIZE_STRING));



$error='';
if(strlen($username) <= 3)
  $error='Введите имя';
else if(strlen($email) <= 3)
  $error='Введите email';
else if(strlen($message) <= 3)
  $error='Введите сообщение';

if($error != '') {
  echo $error;
  exit();
}

$mymail = 'dbtesst@yandex.ru';
$subject = "=?utf-8?B?".base64_encode('New message')."?=";
$headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";

mail($mymail, $subject, $message, $headers);

echo 'готово';

 ?>
