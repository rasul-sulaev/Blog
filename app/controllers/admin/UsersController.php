<?php
include $_SERVER['DOCUMENT_ROOT'] . "/app/database/db.php";

// Массив сообщений о возникших ошибок в форме Регистрации/Авторизации, и оообщение об Успехе
$status_message = [
    'more'      => '',
    'login'     => '',
    'email'     => '',
    'password'  => '',
    'password2' => '',
    'role'      => '',
    'success'   => ''
];


// Данные из полей с формы (если не были отправлены POST запросом, то будет пустая строка)
$login = !empty($_POST['login']) ? htmlspecialchars(trim($_POST['login'])) : '';
$email = !empty($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
$role  = isset($_POST['role'])  ? htmlspecialchars($_POST['role'])  : '';


/** Массив из всех пользователей **/
$users = selectAll('users');


/** Обработчик формы Регистрации пользователя **/
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])) {
    // Данные из полей с формы
    $password  = htmlspecialchars(trim($_POST['password']));
    $password2 = htmlspecialchars(trim($_POST['password2']));

    // Прверка полей формы на ошибки
    if ($login === '' || $email === '' || $password === '') {
        $status_message['more'] = "Не все поля заполнены!";
    } elseif (mb_strlen($login, 'UTF8') < 3) {
        $status_message['login'] = "Логин должен содержать не менее 3х символов!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $status_message['email'] = "Введен некорректный адрес почты!";
    } elseif (selectOne('users', ['email' => $email])) {
        $status_message['email'] = "Указанная почта занята!";
    } elseif (mb_strlen($password) < 8) {
        $status_message['password'] = "Пароль должен содержать не менее 8 символов!";
    } elseif ($password !== $password2) {
        $status_message['password2'] = "Пароли в обеих полях должны совпадать!";
    } elseif ($role === '') {
        $status_message['role'] = "Выберите роль пользователя!";
    } elseif (!in_array($role, ['user', 'admin'])) {
        $status_message['role'] = "Некорректный роль пользователя!";
    } else {
        // Если нет ошибок, то добавляем пользователя в БД
        $form_data = [
            'username' => $login,
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'admin'    => $role === 'admin' ? 1 : NULL,
        ];

        insert('users', $form_data);
        $status_message['success'] = "Пользователь <b>$login</b> успешно зарегистрирован!";

        $login     = '';
        $email     = '';
        $role      = '';
        $password  = '';
        $password2 = '';
    }
}




