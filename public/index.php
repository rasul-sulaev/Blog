<?php
session_start();

//function tt($value) {
//    echo "<pre>";
//    print_r($value);
//    echo "</pre>";
//}

// Подключение фала с Ссылками
include_once "../path.php";

// Подключение к БД
require_once ROOT_PATH."/src/includes/db.php";


// Название используемой темы
$theme = selectOne('themes', ["status" => 1]);
$theme_name = !empty($theme) ? $theme['name'] : 'default';


// Подключение функционального файла активной темы
require_once ROOT_PATH."/themes/$theme_name/functions.php";


// Подключение функционального файла Админ панели
require_once ROOT_PATH."/admin/functions.php";

// Подключаем Router
require_once "../src/includes/router.php";