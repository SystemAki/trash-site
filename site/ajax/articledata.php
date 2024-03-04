<?php
  $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
  $intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
  $text = trim(filter_var($_POST['text'], FILTER_SANITIZE_STRING));

  $error='';
  if(strlen($title) < 3)
    $error='Заголовок заметки должен состоять минимум из  символов';
  else if(strlen($intro) < 5)
    $error='Интро заметки должно состоять минимум из пяти символов';
  else if(strlen($text) < 5)
    $error='Основной текст заметки должен состоять минимум из пяти символов';

  if($error != '') {
    echo $error;
    exit();
  }

  require_once '../connectDB.php';

  $sql = 'INSERT INTO articles(title, intro, text, author, date) VALUES(?, ?, ?, ?, ?)';
  $query = $pdo->prepare($sql);
  $query->execute([$title, $intro, $text, $_COOKIE['log'], time()]);

  echo 'Заметка создана';
 ?>
