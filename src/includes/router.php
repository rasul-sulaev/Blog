<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', trim($uri, '/'));
$file = "../themes/$theme_name/views/$segments[0].php";


// Если Админ (ссылка)
if ($segments[0] === 'admin' && $_SESSION['role'] === 'admin') {
    if (count($segments) === 2 && file_exists(ROOT_PATH."/admin/$segments[1].php")) {
        require ROOT_PATH."/admin/$segments[1].php";
    } else {
        require ROOT_PATH."/admin/index.php";
    }
}


// Для остальных слуяаях
elseif ($uri === '/') {
    require "../themes/$theme_name/views/main.php";
} elseif (file_exists($file) && $segments[0] === 'post') {
    $id_post = isset($segments[1]) ? htmlspecialchars(trim($segments[1])) : NULL;

    // Получение поста
    $post = selectAllFromPostWithUser('users', 'posts', 'categories', "WHERE p.id = $id_post");

    if ($post) {
        $post = $post[0];
        require ROOT_PATH."/themes/$theme_name/views/post.php";
    } else {
        require ROOT_PATH."/themes/$theme_name/views/404.php";
    }
} elseif (file_exists($file) && $segments[0] === 'category') {
    $category_name = isset($segments[1]) ? $segments[1] : NULL;

    // Получение Категории
    $category = selectOne('categories', ["name" => $category_name]);

    if ($category) {
        require ROOT_PATH."/themes/$theme_name/views/category.php";
    } else {
        require ROOT_PATH."/themes/$theme_name/views/404.php";
    }
} elseif (file_exists($file)) {
    require $file;
} else {
    require ROOT_PATH."/themes/$theme_name/views/404.php";
}