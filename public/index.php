<?php
session_start();

function tt($value) {
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

//tt($_SERVER);

// Подключение фала с Ссылками
include_once "../path.php";

// Подключение к БД
require_once "../src/includes/db.php";


// Название используемой темы
$theme_name = 'default';

// Подключение функционального файла активной темы
require_once "../themes/$theme_name/functions.php";


// Подключаем Router
require_once "../src/includes/router.php";