<?php
  require_once '../connectDB.php';

$sql = 'SELECT * FROM `messages` ORDER BY `id` DESC LIMIT 10';
$query = $pdo->query($sql);

$messages = [];

while($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $messages[] = $row;
}

echo json_encode($messages);
?>
