<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
  $website_title = 'Контакты';
  require 'blocks/head.php';
  ?>
</head>
<body>
  <?php require 'blocks/header.php'; ?>
<link rel="stylesheet" href="/css/main.css">
  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3 mt-5">
        <h4>Обратная связь</h4>
        <form>
          <label for="username">Ваше имя</label>
        <input type="text" name="username" value="<?=$_COOKIE['log']?>" id="username" class="form-control">

          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">

          <label for="message">Сообщение</label>
          <textarea type="text" name="message" id="message" class="form-control"></textarea>

          <div class="alert alert-danger mt-2" style='display: none' id="errorblock"></div>

          <button type="button" id="message_send" class="btn btn-success mt-3">Отправить</button>
        </form>
      </div>
    </div>
  </main>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script>
    $(document).ready(function(){
      $('#message_send').click(function() {
        var name = $('#username').val();
        var email = $('#email').val();
        var message = $('#message').val();

        $.ajax({
          url: 'ajax/mail.php',
          type: 'POST',
          cache: false,
          data: {'username' : name, 'email' : email, 'message' : message},
          dataType: 'html',
          success: function (data){
            if(data == 'готово') {
              $('#message_send').text('Сообщение отправлено');
              $('#errorblock').hide();
              $('#email').val("");
              $('#message').val("");
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
