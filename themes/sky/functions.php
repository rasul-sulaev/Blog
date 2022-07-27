<?php
define("THEME_DIR", __DIR__);
define("THEME_NAME", basename(__DIR__));

// функция для подключения Шапки сайта
function get_header() {
    include __DIR__ . '/components/header.php';
}

// функция для подключения Подвала сайта
function get_footer() {
    include __DIR__ . '/components/footer.php';
}

// функция для подключения Сайдбара сайта
function get_sidebar() {
    include __DIR__ . '/components/sidebar.php';
}

// функция для вовзращения пути к папке темы
function get_template_directory_uri() {
    return '/themes/'.THEME_NAME;
}

// Функция для покключения постов (вывод с помощью foreach)
function get_posts_for_content($posts) {
    include __DIR__ . '/components/post.php';
}