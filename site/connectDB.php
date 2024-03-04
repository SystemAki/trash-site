<?php

$user = 'root';
$password = 'root';
$db = 'test_db';
$host = 'localhost';

$dsn = 'mysql:host='.$host.';dbname='.$db;
$pdo = new PDO($dsn, $user, $password);
 

 ?>
