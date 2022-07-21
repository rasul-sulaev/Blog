<?php
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
$id         = isset($segments[3]) ? htmlspecialchars(trim($segments[3])) : '';
//$id    = isset($_GET['id']) ? htmlspecialchars(trim($_GET['id'])) : '';
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
            'role'     => $role
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


/** Получение данных поста для вставки в форму на странице Редактировние поста **/
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($segments[2]) && $segments[2] === 'edit' && isset($segments[3])) {
    $user = selectOne('users', ["id" => $id]);

    $login    = $user['username'];
    $email    = $user['email'];
    $password = $user['password'];
    $role     = $user['role'];
}


/** Обработчик формы Редактрования пользователя **/
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-user'])) {
    // Данные из полей с формы
    $password  = !empty($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : NULL;
    $password2 = !empty($_POST['password2']) ? htmlspecialchars(trim($_POST['password2'])) : NULL;

    // Прверка полей формы на ошибки
    if ($login === '' || $email === '') {
        $status_message['more'] = "Не все поля заполнены!";
    } elseif (mb_strlen($login, 'UTF8') < 3) {
        $status_message['login'] = "Логин должен содержать не менее 3х символов!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $status_message['email'] = "Введен некорректный адрес почты!";
    } elseif (isset($password) && mb_strlen($password) < 8) {
        $status_message['password'] = "Пароль должен содержать не менее 8 символов!";
    } elseif ($password !== $password2) {
        $status_message['password2'] = "Пароли в обеих полях должны совпадать!";
    } elseif ($role === '') {
        $status_message['role'] = "Выберите роль пользователя!";
    } elseif (!in_array($role, ['user', 'admin'])) {
        $status_message['role'] = "Некорректный роль пользователя!";
    } else {
        // Если нет ошибок, то добавляем пользователя в БД
        // Если поле пароль было заполнено, то обновлеем поле `password` тоже, если нет - то не обновляем
        if (isset($password)) {
            $form_data = [
                'username' => $login,
                'email'    => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role'     => $role
            ];
        } else {
            $form_data = [
                'username' => $login,
                'email'    => $email,
                'role'     => $role
            ];
        }


        update('users', (int)$id, $form_data);
        $status_message['success'] = "Профиль пользователя <b>$login</b> успешно отредактировано!";
    }
}



/** Обработчик формы Удаления пользователя **/
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_delete'])) {
    $id = !empty($_GET['id_delete']) ? htmlspecialchars(trim($_GET['id_delete'])) : '';

    if (!empty($id)) {
        $user = selectOne('users', ["id" => $id]);

        // Удаление записи из БД
        delete('users', (int)$id);

        header('location: /admin/users/');
    }
}



/** Обработка формы Редактирования статуса поста со страницы Посты **/
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['role'])) {
    $id = isset($_GET['id']) ? htmlspecialchars(trim($_GET['id'])) : '';
    $role = !empty($_GET['role']) ? htmlspecialchars($_GET['role']) : '';

    // Прверка полей формы на ошибки
    if (!$user = selectOne('users', ["id" => $id])) {
        die("Error 404 - Не существует такой пользователь!");
    } elseif ($role === '') {
        die("Укажите значение для статуса поста!");
    } elseif (!in_array($role, ['admin', 'user'])) {
        die("Укажите правильное значение для статуса пользователя!");
    } else {
        // Обновление поля `status` в таблице `posts` БД
        update('users', $id, ["role" => $role]);

        header('location: /admin/users/');
    }
}