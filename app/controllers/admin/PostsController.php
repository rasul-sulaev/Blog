<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/database/db.php";

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
$id         = isset($_GET['id']) ? htmlspecialchars(trim($_GET['id'])) : '';
$title      = !empty($_POST['title']) ? htmlspecialchars(trim($_POST['title'])) : '';
$content    = !empty($_POST['content']) ? trim($_POST['content']) : '';
$upload_img = isset($_FILES['img']) ? $_FILES['img'] : '';
$category   = !empty($_POST['category']) ? htmlspecialchars($_POST['category']) : '';
$status     = !empty($_POST['status']) ? htmlspecialchars($_POST['status']) : 'N';
$top_post   = isset($_GET['top_post']) ? htmlspecialchars($_GET['top_post']) : NULL;



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
    } elseif (mb_strlen($title, 'UTF8') < 5) {
        $status_message['title'] = "Название должно содержать не менее 5 символов!";
    } elseif (selectOne('posts', ["title" => $title])) {
        $status_message['title'] = "Пост с таким названием существует!";
    } elseif (mb_strlen($content, 'UTF8') < 100) {
        $status_message['content'] = "Контент должен содержать не менее 100 символов!";
    } elseif ($upload_img['name'] === '') {
        $status_message['img'] = "Добавьте превью картинку для поста!";
    } elseif ($category === '') {
        $status_message['category'] = "Выберите категорию для поста!";
    } else {
        // Путь куда сохранить картинку на сервере
        $upload_img_name = time()."_{$upload_img['name']}";
        $destination = ROOT_PATH . "/uploads/img/posts/" . $upload_img_name;

        // Праверка картинки перед отправкой на сервер
        if (strpos($upload_img['type'], 'image') !== 0) {
            return $status_message['img'] = "Загружать можно только картинки!";
        } else {
            $result = move_uploaded_file($upload_img['tmp_name'], $destination);
            if (!$result) {
                return $status_message['img'] = "Возника ошибка при загрузке картинки!";
            }
        }


        // Массив данных для записи в БД
        $post = [
            "id_user"     => $_SESSION['id'],
            "title"       => $title,
            "content"     => $content,
            "img"         => $upload_img_name,
            "id_category" => $category,
            "status"      => $status
        ];

        insert('posts', $post);

        $status_message['success'] = "Пост <b>$title</b> успешно создана!";
        $title = '';
        $content = '';
        $category = '';
        $status = '';
        unset($_FILES['img']);
    }
}


/** Получение данных поста для вставки в форму на странице Редактировние поста **/
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $post = selectOne('posts', ["id" => $id]);

    $title    = $post['title'];
    $content  = $post['content'];
    $img      = $post['img'];
    $category = $post['id_category'];
    $status   = $post['status'];
}


/** Обработчик формы Редактрования поста **/
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-post'])) {
    // Получение поста из БД
    $post = selectOne('posts', ["id" => $id]);
    $img = $post['img'];

    // Прверка полей формы на ошибки
    if ($title === '' || $content === '') {
        $status_message['more'] = "Не все поля заполнены!";
    } elseif (mb_strlen($title, 'UTF8') < 5) {
        $status_message['title'] = "Название должно содержать не менее 5 символов!";
    } elseif (mb_strlen($content, 'UTF8') < 100) {
        $status_message['content'] = "Контент должен содержать не менее 100 символов!";
    }
    elseif ($img ? $img === '' : $upload_img['name'] === '') {
        $status_message['img'] = "Добавьте превью картинку для поста!";
    }
    elseif ($category === '') {
        $status_message['category'] = "Выберите категорию для поста!";
    } else {
        // Если в форму была загружена новая картинка
        $upload_img_name = NULL;
        if (!empty($upload_img['name'])) {

            // Удаление старой картинки с сервера
            $old_img = ROOT_PATH . "/uploads/img/posts/" . $img;
            unlink($old_img);

            // Путь куда сохранить новую картинку на сервере
            $upload_img_name = time()."_{$upload_img['name']}";
            $destination = ROOT_PATH . "/uploads/img/posts/" . $upload_img_name;

            // Праверка картинки перед отправкой на сервер
            if (strpos($upload_img['type'], 'image') !== 0) {
                return $status_message['img'] = "Загружать можно только картинки!";
            } else {
                $result = move_uploaded_file($upload_img['tmp_name'], $destination);
                if (!$result) {
                    return $status_message['img'] = "Возника ошибка при загрузке картинки!";
                }
            }
        }


        // Массив данных для записи в БД
        $post = [
            "id_user"     => $_SESSION['id'],
            "title"       => $title,
            "content"     => $content,
            "img"         => $upload_img_name ? $upload_img_name : $img,
            "id_category" => $category,
            "status"      => $status
        ];

        update('posts', (int)$id, $post);
        $status_message['success'] = "Пост <b>$title</b> успешно создана!";
    }
}


/** Обработчик формы Удаления поста **/
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = !empty($_GET['delete_id']) ? htmlspecialchars(trim($_GET['delete_id'])) : '';

    if (!empty($id)) {
        $post = selectOne('posts', ["id" => $id]);

        // Удаление записи из БД
        delete('posts', (int)$id);

        // Удаление картинки с сервера
        $img = ROOT_PATH . "/uploads/img/posts/" . $post['img'];
        unlink($img);

        header('location: /admin/posts/');
    }
}



/** Обработка формы Редактирования статуса поста со страницы Посты **/
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['status'])) {
    $id = isset($_GET['id']) ? htmlspecialchars(trim($_GET['id'])) : '';
    $status = !empty($_GET['status']) ? htmlspecialchars($_GET['status']) : '';

    // Прверка полей формы на ошибки
    if (!$post = selectOne('posts', ["id" => $id])) {
        die("Error 404 - Не существует такой пост!");
    } elseif ($status === '') {
        die("Укажите значение для статуса поста!");
    } elseif (!in_array($status, ['N', 'P', 'D'])) {
        die("Укажите правильное значение для статуса поста!");
    } else {
        // Обновление поля `status` в таблице `posts` БД
        update('posts', $id, ["status" => $status]);

        header('location: /admin/posts/');
    }
}


/** Обработка формы Редактирования ТОП поста со страницы Посты **/
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_for_top'])) {
    $id = isset($_GET['id_for_top']) ? htmlspecialchars(trim($_GET['id_for_top'])) : '';
    $top_post = !empty($_GET['top_post']) ? htmlspecialchars($_GET['top_post']) : '';

    // Прверка полей формы на ошибки
    if (!$post = selectOne('posts', ["id" => $id])) {
        die("Error 404 - Не существует такой пост!");
    } else {
        // Обновление поля `status` в таблице `posts` БД
        update('posts', $id, ["top_post" => !empty($top_post) ? 1 : NULL]);

        header('location: /admin/posts/');
    }
}