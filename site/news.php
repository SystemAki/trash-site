<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
  require_once 'connectDB.php';
  $sql = 'SELECT * FROM `articles` WHERE `id` = :id';
  $query = $pdo->prepare($sql);
  $query->execute(['id'=>$_GET['id']]);
  $article = $query->fetch(PDO::FETCH_OBJ);
  $website_title = $article->title;
  require 'blocks/head.php';
  ?>

</style>
</head>
<body>
  <?php
  if(isset($_POST['username']) && isset($_POST['comment'])) {
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $comment = trim(filter_var($_POST['comment'], FILTER_SANITIZE_STRING));

    $sql = 'INSERT INTO comments(name, comment, article_id) VALUES(?, ?, ?)';
    $query = $pdo->prepare($sql);
    $query->execute([$username, $comment, $_GET['id']]);
  }
   ?>
  <?php require 'blocks/header.php'; ?>
  <main class="container mt-5 mb-5">
    <div class="row">
      <div class="col-md-8 mb-3 mt-5">
        <div class="jumbotron">
          <h1><?=$article->title?></h1>
          <p><b>Автор статьи: </b> <mark><?=$article->author?></mark></p>
          <?php
            $date = date("Y-m-d H:i:s", $article->date);
           ?>
           <p><b>Дата публикации: </b> <?=$date?></p>
          <p><?=$article->intro?></p><br>
          <p><?=$article->text?></p>
        </div>
        <h3 class="mt-5">Комментарии:</h3>
          <form action = "/news.php?id=<?=$_GET['id']?>" method = "post">
          <label for="username">Ваше имя</label>
          <input type="text" name="username" value="<?=$_COOKIE['log']?>" id="username" class="form-control">

          <label for="comment">Комментарий</label>
          <textarea name="comment" id="comment" class="form-control"></textarea>

          <button type="submit" id="comment_post" class="btn btn-success mt-3">Отправить</button>
        </form>

          <div class="jumbotron mt-5">
            <?php
              $sql = 'SELECT * FROM `comments` WHERE `article_id` = :id ORDER BY `id` DESC';
              $query = $pdo->prepare($sql);
              $query->execute(['id' =>  $_GET['id']]);
              while($row = $query->fetch(PDO::FETCH_OBJ)) {
                echo "<div class='alert alert-info mb-20'>
                  <h4>$row->name</h4>
                  <p>$row->comment</p>
                </div>";
              }
            ?>
          </div>
      </div>
      <?php require 'blocks/aside.php'; ?>
    </div>
  </main>
</body>
</html>
