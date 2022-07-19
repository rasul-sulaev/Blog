<?php
/** Записываем данные пользователя в SESSION **/
function writeToSessionUser($user) {
    $_SESSION['id']    = $user['id'];
    $_SESSION['login'] = $user['username'];
    $_SESSION['role']  = $user['role'];
}

// Массив сообщений о возникших ошибок в форме Регистрации/Авторизации, и оообщение об Успехе
$status_message = [
    'more'      => '',
    'login'     => '',
    'email'     => '',
    'password'  => '',
    'password2' => '',
    'success'   => ''
];

// Данные из полей с формы (если не были отправлены POST запросом, то будет пустая строка)
$login = !empty($_POST['login']) ? htmlspecialchars($_POST['login']) : '';
$email = !empty($_POST['email']) ? htmlspecialchars($_POST['email']) : '';


/** Обработчик формы Регистрации **/
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
    // Данные из полей с формы
    $password  = $_POST['password'];
    $password2 = $_POST['password2'];

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
    } else {
        // Если нет ошибок, то добавляем пользователя в БД
        $form_data = [
            'username' => $login,
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        $id = insert('users', $form_data);
        $status_message['success'] = "Пользователь <b>$login</b> успешно зарегистрирован!<br><span>Через 3 сек вас переведут на  <a href='/'>Главную</a> стираницу!</span>";

        // Получаем данные зарегестрированного пользователя
        $user = selectOne('users', ['id' => $id]);

        // Редирект на Главную старницу сайта
        header( "Refresh:3; url='/'",  true, 302);
        list($login, $email) = ['', ''];
    }
}


/** Обработчик формы Авторизации **/
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-login'])) {
    // Данные из полей с формы
    $password = $_POST['password'];

    // Проверка количеств попыток входа, с неправильным паролем
    if (isset($_SESSION[$email]) && $_SESSION[$email]['count'] >= 3) {
        // Если не указано время начала блокировки, то указываем
        // Если время было указано, и оно уже прошло, то удаляем количество попыток и саму блокировку полностью
        // В ином случае (если время блокировки не истекло), то прерываем код
        if (!isset($_SESSION[$email]['blocked-time-start'])) {
            $_SESSION[$email]['blocked-time-start'] = time();
            $_SESSION[$email]['blocked-time-end'] = $_SESSION[$email]['blocked-time-start'] + 300;
        } elseif ($_SESSION[$email]['blocked-time-end'] <= time()) {
            unset($_SESSION[$email]);
        }
        return;
    } elseif (isset($_SESSION[$email]) && $_SESSION[$email]['count'] < 3) {
        $_SESSION[$email]['count'] += 1;
    } else {
        $_SESSION[$email]['count'] = 1;
    }

    // Прверка полей форы на ошибки
    if ($email === '' || $password === '') {
        $status_message['more'] = "Не все поля заполнены!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $status_message['email'] = "Введен некорректный адрес почты!";
    } elseif (!$user = selectOne('users', ['email' => $email])) {
        $status_message['email'] = "Пользователь с такой почтой не существует!";
    } elseif (mb_strlen($password) < 8) {
        $status_message['password'] = "Пароль должен содержать не менее 8 символов!";
    } elseif (!password_verify($password, $user['password'])) {
        $status_message['password'] = "Пароль не верный!";
    } else {
        writeToSessionUser($user);

        // Если у данной почты были неудачные попытки Входа, до удаляем их при удачной авторизации
        if (isset($_SESSION[$email])) unset($_SESSION[$email]);

        // Редирект на страницу Админки, если пользователь админ, если нет, то редиректим на Главную страницу сайта
        if ($_SESSION['role'] === 'admin') {
            header('location: /admin/');
        } else {
            header('location: /');
        }
    }
}