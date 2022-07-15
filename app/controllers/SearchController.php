<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/database/db.php";

// Данные
$query = isset($_GET['query']) ? htmlspecialchars(trim($_GET['query'])) : NULL;

/** Обработка формы Поиска **/
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['query'])) {
    // Массив резельтатов поиска
    $results = searchInTitleAndContent($query, 'users', 'posts', 'categories');
}