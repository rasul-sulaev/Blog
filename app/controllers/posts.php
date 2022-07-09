<?php
include $_SERVER['DOCUMENT_ROOT']."/app/database/db.php";

// Массив сообщений о возникших ошибок в форме Регистрации/Авторизации, и оообщение об Успехе
$status_message = [
    'more'     => '',
    'title'    => '',
    'content'  => '',
    'img'      => '',
    'category' => '',
    'success'  => ''
];


// Данные из полей с формы (если не были отправлены POST запросом, то будет пустая строка)
$title = !empty($_POST['title']) ? htmlspecialchars(trim($_POST['title'])) : '';
$content = !empty($_POST['content']) ? trim($_POST['content']) : '';
//$img = !empty($_FILES['img']) ? trim($_POST['img']) : '';
$img = !empty($_FILES['img']) ? $_FILES['img'] : '';
$category = !empty($_POST['category']) ? htmlspecialchars($_POST['category']) : '';
$publish = isset($_POST['publish']) ? 'P' : 'N';


// Массив категорий
$categories = selectAll('categories');

// Массив постов
$posts = selectAll('posts');

// Получаем массив из склееных таблиц
$userPosts = selectAllFromPostWithUser('users', 'posts', 'categories');


/** Обработчик формы Создания поста **/
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-post'])) {
    // Прверка полей формы на ошибки
    if ($title === '' || $content === '') {
        $status_message['more'] = "Не все поля заполнены!";
    } elseif (mb_strlen($title, 'UTF8') < 5 && mb_strlen($title, 'UTF8') > 255) {
        $status_message['title'] = "Название должно содержать не менее 5 символов!";
    } elseif (selectOne('posts', ["title" => $title])) {
        $status_message['title'] = "Пост с таким названием существует!";
    } elseif (mb_strlen($content, 'UTF8') < 100) {
        $status_message['content'] = "Контент должен содержать не менее 100 символов!";
    } elseif ($img['name'] === '') {
        $status_message['img'] = "Добавьте превью картинку для поста!";
    } elseif ($category === '') {
        $status_message['category'] = "Выберите категорию для поста!";
    } else {
        // Путь куда сохранить картинку на сервере
        $img_name = time()."_{$img['name']}";
        $destination = ROOT_PATH . "/uploads/img/posts/" . $img_name;

        // Праверка картинки перед отправкой на сервер
        if (strpos($img['type'], 'image') !== 0) {
            $status_message['img'] = "Загружать можно только картинки!";
            return;
        } else {
            $result = move_uploaded_file($img['tmp_name'], $destination);
            if (!$result) {
                $status_message['img'] = "Возника ошибка при загрузке картинки!";
                return;
            }
        }


        // Массив данных для записи в БД
        $post = [
            "id_user"     => $_SESSION['id'],
            "title"       => $title,
            "content"     => $content,
            "img"         => $img_name,
            "id_category" => $category,
            "status"      => $publish
        ];

        insert('posts', $post);

        $status_message['success'] = "Пост <b>$title</b> успешно создана!";
        $title = '';
        $content = '';
        $category = '';
        unset($_FILES['img']);
    }
}