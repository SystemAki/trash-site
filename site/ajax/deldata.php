<?php
require_once '../connectDB.php';

if(isset($_POST['id'])) {
    $del_userid = $_POST['id'];
    $sql = 'DELETE FROM `users` WHERE `id` = :userid';
    $delquery = $pdo->prepare($sql);
    $delquery->execute(['userid' => $del_userid]);
}
?>
