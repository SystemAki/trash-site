<?php
  $message = trim(filter_var($_POST['message'], FILTER_SANITIZE_STRING));


  $error='';
  if(strlen($message) <= 3)
    $error='Введите сообщение';

  if($error != '') {
    echo $error;
    exit();
  }

  require_once '../connectDB.php';

  $sql = 'INSERT INTO messages(username, message) VALUES(?, ?)';
  $query = $pdo->prepare($sql);
  $query->execute([$_COOKIE['log'], $message]);

  echo 'готово';
 ?>
