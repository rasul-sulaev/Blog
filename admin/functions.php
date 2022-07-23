<?php

// функция для подключения Шапки сайта
function get_admin_header() {
    include __DIR__.'/components/header.php';
}

// функция для подключения Сайдбара сайта
function get_admin_sidebar() {
    include __DIR__.'/components/sidebar.php';
}

// функция для вывода Менеджер бара на страницах админки
function get_admin_content_manager_bar($page) {
    require __DIR__ . '/components/content-manager-bar.php';
}

// Функция для Вставки разметки страниц на страницу админки
function get_admin_content($segments) {
    if (count($segments) === 1 && $segments[0] === 'admin') {
        require __DIR__.'/views/index.php';
    }
    elseif (count($segments) === 2 && file_exists(ROOT_PATH."/admin/$segments[1].php")) {
        require ROOT_PATH."/admin/$segments[1].php";
    }
    elseif (count($segments) === 2 && file_exists(ROOT_PATH."/admin/views/$segments[1]/index.php")) {
        require ROOT_PATH."/admin/views/$segments[1]/index.php";
    } elseif (count($segments) >= 3 && file_exists($file_to_dir_in_admin = ROOT_PATH."/admin/views/$segments[1]/$segments[2].php")) {
        require $file_to_dir_in_admin;
    } else {
        require ROOT_PATH."/admin/views/404.php";
    }
}