<?php
    if(!isset($_COOKIE['log'])) {
      header('Location: /reg.php');
      exit();
    }
 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
  $website_title = 'Добавление заметки';
  require 'blocks/head.php';
  ?>
  <style>
  html {
    position: relative;
    min-height: 100%;
  }
  body {
    margin-bottom: 120px;
  }
  footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 100px;
  }
    </style>
</head>
<body>
  <?php require 'blocks/header.php'; ?>
<link rel="stylesheet" href="/css/main.css">
<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3 mt-5">
            <h4>Добавление заметки</h4>
            <form>
                <label for="title">Заголовок заметки</label>
                <input type="text" name="title" id="title" class="form-control">
                <label for="intro">Интро заметки</label>
                <textarea type="intro" name="intro" id="intro" class="form-control"></textarea>
                <label for="text">Основной текст</label>
                <textarea type="text" name="text" id="text" class="form-control"></textarea>
                <div class="alert alert-danger mt-2" style='display: none' id="errorblock"></div>
                <button type="button" id="article_post" class="btn btn-success mt-3">Опубликовать</button>
            </form>
        </div>
</main>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script>
    $(document).ready(function(){
      $('#article_post').click(function() {
        var title = $('#title').val();
        var intro = $('#intro').val();
        var text = $('#text').val();

        $.ajax({
          url: 'ajax/articledata.php',
          type: 'POST',
          cache: false,
          data: {'title' : title, 'intro' : intro, 'text' : text},
          dataType: 'html',
          success: function (data){
            if(data == 'Заметка создана') {
              $('#article_post').text('Опубликовано!');
              $('#errorblock').hide();
            }
            else {
              $('#errorblock').show();
              $('#errorblock').text(data);
            }
          }
        });
      });
    });
  </script>
</body>
</html>
