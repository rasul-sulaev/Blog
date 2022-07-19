<?php
// Массив сообщений о возникших ошибок в форме Регистрации/Авторизации, и оообщение об Успехе
$status_message = [
    'more'     => '',
    'username' => '',
    'email'    => '',
    'comment'  => '',
    'success'  => ''
];


// Данные из полей с формы (если не были отправлены POST запросом, то будет пустая строка)
//$id      = isset($_GET['id']) ? htmlspecialchars(trim($_GET['id'])) : '';
$id      = isset($segments[3]) ? htmlspecialchars(trim($segments[3])) : '';
$comment = isset($_POST['comment']) ? htmlspecialchars(trim($_POST['comment'])) : '';
$status  = isset($_POST['status']) ? htmlspecialchars(trim($_POST['status'])) : '';


// Для страницы post.php
//tt($segments);
if ($segments[0] === 'post') {
    $id_post  = isset($segments[1]) ? htmlspecialchars(trim($segments[1])) : '';

    // Все кооментарии с данными автора относящиеся к указанной статье,  со статусом 1
    $comments = selectAllFromCommentsWithUser('comments', 'users', ["id_post" => $id_post, "status" => 1], ' ORDER BY com.createdAt DESC');
}

// Все комментария с данными автора, для вывода в админке
$commentsAll = selectAllFromCommentsWithUser('comments', 'users', null, ' ORDER BY com.createdAt DESC');


/** Добавление Комментария со страницы Поста **/
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send-comment'])) {
    // Прверка полей формы на ошибки
    if  (mb_strlen($comment, 'UTF8') < 10 && $_SESSION['role'] === 'user') {
        $status_message['comment'] = "Комментарий должен содержать не менее 10 символов!";
    } else {
        $comment = [
            "id_user" => $_SESSION['id'],
            "id_post" => $id_post,
            "status"  => $_SESSION['role'] === 'admin' ? 1 : NULL,
            "comment" => $comment
        ];

        insert('comments', $comment);

        $status_message['success'] = "Комментарий отправлен на модерацию!";
        $email = '';
        $comment = '';
    }
}


/** Получение данных Комментария для вставки в форму на странице Редактировние комментария **/
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($segments[2]) && $segments[2] === 'edit' && isset($segments[3])) {
    $commentOne = selectOne('comments', ["id" => $id]);

    $status     = $commentOne['status'];
    $comment    = $commentOne['comment'];
}


/** Обработчик формы Редактрования комментария **/
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-comment'])) {
    // Прверка полей формы на ошибки
    if  (mb_strlen($comment, 'UTF8') < 10) {
        $status_message['comment'] = "Комментарий должен содержать не менее 10 символов!";
    }

    else {
        $formData = [
            "status" => !empty($status) ? 1 : NULL,
            "comment" => $comment
        ];

        update('comments', (int)$id, $formData);
        $status_message['success'] = "Комментарий успешно изменен!";
    }
}


/** Обработчик формы Удаления комментария **/
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_delete'])) {
    $id = !empty($_GET['id_delete']) ? htmlspecialchars(trim($_GET['id_delete'])) : '';

    if (!empty($id)) {
        // Удаление записи из БД
        delete('comments', (int)$id);

        header('location: /admin/comments/');
    }
}


/** Обработка формы Редактирования статуса Публикации комментария со страницы Комментарии **/
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_comment_for_change_status'])) {
    $id = isset($_GET['id_comment_for_change_status']) ? htmlspecialchars(trim($_GET['id_comment_for_change_status'])) : '';
    $status = !empty($_GET['status']) ? htmlspecialchars($_GET['status']) : '';

    // Прверка полей формы на ошибки
    if (!$comment = selectOne('comments', ["id" => $id])) {
        die("Error 404 - Не существует такой комментарий!");
    } else {
        // Обновление поля `status` в таблице `comments` БД
        update('comments', $id, ["status" => !empty($status) ? 1 : NULL]);

        header('location: /admin/comments/');
    }
}