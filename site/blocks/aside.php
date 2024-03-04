<aside class="col-md-4">
  <div class="p-3 mb-3 bg-warning rounded mt-5">
    <h4><b>Интересное на сайте</b></h4>
    <p>Переживём пока без интересного ¯\_(ツ)_/¯</p>
  </div>
  <div class="p-3 mb-3">
    <img class="img-thumbnail" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHqFccRtkV4wsbiPxnKhRKs3XGxYswf0DIyA&usqp=CAU">
  </div>
  <div class="col-md mb-3">
    <h4>Последние сообщения</h4>
    <div id="chat_block">
    </div>
    <form id="message_form">
      <label for="message">Ваше сообщение</label>
      <input type="text" name="message" id="message" class="form-control">
      <button type="button" id="send_message" class="btn btn-primary mt-3">Отправить</button>
    </form>
  </div>
</aside>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        function updateChat() {
            $.ajax({
                url: 'ajax/chat_data.php',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#chat_block').empty();
                    $.each(data, function(index, message) {
                        $('#chat_block').append('<div>' + message.username + ': ' + message.message + '</div>');
                    });
                }
            });
        }

        updateChat();
        setInterval(updateChat, 5000);

        $('#send_message').click(function() {
            var message = $('#message').val();
            $.ajax({
                url: 'ajax/send_chat.php',
                type: 'POST',
                data: {'message': message},
                dataType: 'json',
                success: function (response) {
                    if(response.success) {
                        updateChat();
                        $('#message').val('');
                    } else {
                        alert('Ошибка при отправке сообщения');
                    }
                }
            });
        });
    });
</script>
