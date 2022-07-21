<?php
// Массив сообщений о возникших ошибок в форме Регистрации/Авторизации, и оообщение об Успехе
$status_message = [
    'comment'  => '',
    'success'  => ''
];


// Данные из полей с формы (если не были отправлены POST запросом, то будет пустая строка)
$id_post  = isset($segments[1]) ? htmlspecialchars(trim($segments[1])) : '';
$comment = isset($_POST['comment']) ? htmlspecialchars(trim($_POST['comment'])) : '';

// Все кооментарии с данными автора относящиеся к указанной статье,  со статусом 1
$comments = selectAllFromCommentsWithUser('comments', 'users', ["id_post" => $id_post, "status" => 1], ' ORDER BY com.createdAt DESC');


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