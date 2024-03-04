<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
  $website_title = 'Авторизация';
  require 'blocks/head.php';
  ?>
</head>
<body>
  <?php require 'blocks/header.php'; ?>
<link rel="stylesheet" href="/css/main.css">
  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3 mt-5">
        <?php
          if(!isset($_COOKIE['log'])):
         ?>
        <h4>Форма авторизации</h4>
        <form>
          <label for="login">Логин</label>
          <input type="text" name="login" id="login" class="form-control">

          <label for="pass">Пароль</label>
          <input type="password" name="pass" id="pass" class="form-control">

          <div class="alert alert-danger mt-2" style='display: none' id="errorblock"></div>

          <button type="button" id="auth_user" class="btn btn-success mt-3">Авторизоваться</button>
        </form>
        <?php
          else:
         ?>
         <h2><?=$_COOKIE['log']?></h2>
         <button id="exit_btn" class="btn btn-danger mt-3">Выйти</button>
        <?php
          endif;
         ?>
      </div>
    </div>
  </main>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script>
      $('#auth_user').click(function() {
        var login = $('#login').val();
        var pass = $('#pass').val();

        $.ajax({
          url: 'ajax/authdata.php',
          type: 'POST',
          cache: false,
          data: {'login' : login, 'pass' : pass},
          dataType: 'html',
          success: function (data){
            if(data == 'готово') {
              $('#auth_user').text('Успешно');
              $('#errorblock').hide();
              document.location.reload(true);
            } else {
              $('#errorblock').show();
              $('#errorblock').text(data);
            }
          }
        });
      });

      $('#exit_btn').click(function() {

        $.ajax({
          url: 'ajax/exitdata.php',
          type: 'POST',
          cache: false,
          data: {},
          dataType: 'html',
          success: function (data){
            document.location.reload(true);
          }
        });
      });
  </script>
</body>
</html>
