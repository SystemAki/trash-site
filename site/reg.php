<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
  $website_title = 'Регистрация';
  require 'blocks/head.php';
  ?>
</head>
<body>
  <?php require 'blocks/header.php'; ?>
<link rel="stylesheet" href="/css/main.css">
  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <h4>Форма регистрации</h4>
        <form>
          <label for="username">Ваше имя</label>
          <input type="text" name="username" id="username" class="form-control">

          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">

          <label for="login">Логин</label>
          <input type="text" name="login" id="login" class="form-control">

          <label for="pass">Пароль</label>
          <input type="password" name="pass" id="pass" class="form-control">

          <div class="alert alert-danger mt-2" style='display: none' id="errorblock"></div>

          <button type="button" id="reg_user" class="btn btn-success mt-3">Зарегистрироваться</button>
        </form>
      </div>
    </div>
  </main>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script>
    $(document).ready(function(){
      $('#reg_user').click(function() {
        var name = $('#username').val();
        var email = $('#email').val();
        var login = $('#login').val();
        var pass = $('#pass').val();

        $.ajax({
          url: 'ajax/regdata.php',
          type: 'POST',
          cache: false,
          data: {'username' : name, 'email' : email, 'login' : login, 'pass' : pass},
          dataType: 'html',
          success: function (data){
            if(data == 'готово') {
              $('#reg_user').text('Успешно');
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
