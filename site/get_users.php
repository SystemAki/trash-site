<?php
require_once 'connectDB.php';

$sql = 'SELECT `id`, `login`, `name` FROM `users`';
$query = $pdo->query($sql);

$users = [];

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $users[] = [
        'id' => $row['id'],
        'login' => $row['login'],
        'name' => $row['name']
    ];
}
?>
