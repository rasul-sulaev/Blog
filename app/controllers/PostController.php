<?php
include $_SERVER['DOCUMENT_ROOT'] . "/app/database/db.php";

// Данные
$id = isset($_GET['id']) ? htmlspecialchars(trim($_GET['id'])) : NULL;

// Получение поста
$post = selectAllFromPostWithUser('users', 'posts', 'categories', "WHERE p.id = $id");

if ($post) {
    return $post = $post[0];
} else {
   return;
}