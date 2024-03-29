<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
  $website_title = 'Blog';
  require 'blocks/head.php';
  ?>
</head>
<body>
  <?php require 'blocks/header.php'; ?>
  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3 mt-5">
        <?php
        require_once 'connectDB.php';
        $sql = 'SELECT * FROM `articles` ORDER BY `id` DESC';
        $query = $pdo->query($sql);
        while($row = $query->fetch(PDO::FETCH_OBJ)) {
          echo "<h2>$row->title</h2>
            <p>$row->intro</p>
            <p><b>Автор статьи: </b>$row->author</p>
            <a href='/news.php?id=$row->id' title='$row->title'>
              <button class='btn btn-warning mb-4'>Читать далее</button>
            </a>";
        }
         ?>
      </div>
      <?php require 'blocks/aside.php'; ?>
    </div>
    <div class="row">
    </div>
  </main>
  <?php require 'blocks/footer.php'; ?>
</body>
</html>
