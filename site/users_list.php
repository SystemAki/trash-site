<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
  $website_title = 'Пользователи';
  require 'blocks/head.php';
  ?>
</head>
<body>
  <?php require 'blocks/header.php'; ?>
<link rel="stylesheet" href="/css/main.css">
  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3 mt-5">
        <h4>Управление пользователями</h4>
        <form>

          <div id="users-list">

          <?php
          require_once "get_users.php";
          ?>

          <div id="users-list">
              <?php foreach ($users as $user): ?>
                  <div class='user-block'>
                      <p>Логин: <?php echo $user['login'] ?></p>
                      <p>Имя: <?php echo $user['name'] ?></p>
                      <button class="btn btn-danger delete-user" data-user-id="<?php echo $user['id'] ?>">Удалить</button>
                      <br></br>
                  </div>
              <?php endforeach; ?>
          </div>

        </form>
      </div>
    </div>
  </main>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script>
    $(document).ready(function(){
      $('.delete-user').click(function() {
        var userid = $(this).data('user-id');

        $.ajax({
          url: 'ajax/deldata.php',
          type: 'POST',
          cache: false,
          data: {'id': userid},
          dataType: 'html',
          success: function (data){
            document.location.reload(true);
          }
        });
      });
    });
  </script>
</body>
</html>
