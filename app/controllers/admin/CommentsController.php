<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/database/db.php";

// Массив сообщений о возникших ошибок в форме Регистрации/Авторизации, и оообщение об Успехе
$status_message = [
    'more'     => '',
    'username' => '',
    'email'    => '',
    'comment'  => '',
    'success'  => ''
];



// Данные из полей с формы (если не были отправлены POST запросом, то будет пустая строка)
$id_post  = isset($_GET['id']) ? htmlspecialchars(trim($_GET['id'])) : '';
//$username = isset($_POST['username']) ? htmlspecialchars(trim($_POST['username'])) : '';
//$email    = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
$comment  = isset($_POST['comment']) ? htmlspecialchars(trim($_POST['comment'])) : '';




if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send-comment'])) {
    tt($_SESSION);

    tt($_POST);

    // Прверка полей формы на ошибки
//    if ($email === '' || $comment === '') {
//        $status_message['more'] = "Не все поля заполнены!";
//    }
//    elseif (mb_strlen($username, 'UTF8') < 2) {
//        $status_message['name'] = "ФИО должно содержать не менее 3х символов!";
//    }
//    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//        $status_message['email'] = "Введен некорректный адрес почты!";
//    } elseif (!$user = selectOne('users', ['email' => $email])) {
//        $status_message['email'] = "Указанная почта не зарегистрирована!";
//    }

//    $id_user = $_SESSION['id'];


    if  (mb_strlen($comment, 'UTF8') < 50) {
        $status_message['comment'] = "Комментарий должен содержать не менее 50 символов!";
    } else {
        $comment = [
            "id_user" => $_SESSION['id'],
            "id_post" => $id_post,
            "status" => $_SESSION['role'] === 'admin' ? 1 : 0,
            "comment" => $comment
        ];

        insert('comments', $comment);

        $status_message['success'] = "Комментарий успешно добавлен!";
        $email = '';
        $comment = '';
    }
}
