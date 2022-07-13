<?php

$driver  = 'mysql';
$host    = 'localhost';
$db_name = 'blog';
$db_user = 'root';
$db_pass = 'root';
$charset = 'utf8mb4';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try {
    $db = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $options);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данный {$e->getMessage()}");
}
