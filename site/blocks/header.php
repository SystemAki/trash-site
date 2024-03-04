<div class="navbar navbar-dark bg-dark shadow-sm fixed-top">
  <div class="container d-flex justify-content-between align-items-center">
    <a href="/" class="navbar-brand">
      <strong>Blog</strong>
    </a>
    <div>
      <a class="btn btn-outline-primary" href="/">Главная</a>
      <a class="btn btn-outline-primary" href="/contacts.php">Контакты</a>
      <?php
        if(!isset($_COOKIE['log'])):
       ?>
      <a class="btn btn-outline-primary" href="/auth.php">Войти</a>
      <a class="btn btn-outline-primary" href="/reg.php">Регистрация</a>
      <a class="btn btn-outline-primary" href="/users_list.php">Список пользователей</a>
      <?php
        else:
       ?>
      <a class="btn btn-outline-primary" href="/auth.php">Мой профиль</a>
      <a class="btn btn-outline-primary" href="/article.php">Добавить заметку</a>
      <?php
        endif;
       ?>
    </div>
  </div>
</div>
