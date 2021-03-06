<?php
// Массив сообщений о возникших ошибок в форме Регистрации/Авторизации, и оообщение об Успехе
$status_message = [
    'more'        => '',
    'name'        => '',
    'description' => '',
    'success'     => ''
];

// Данные из полей с формы (если не были отправлены POST запросом, то будет пустая строка)
$id          = isset($segments[3]) ? htmlspecialchars(trim($segments[3])) : '';
$name        = !empty($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$description = !empty($_POST['description']) ? htmlspecialchars($_POST['description']) : '';


/** Массив из всех категорий **/
$categories = selectAll('categories');

/** Обработчик формы Создания категории **/
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-category'])) {
    // Прверка полей формы на ошибки
    if ($name === '' || $description === '') {
        $status_message['more'] = "Не все поля заполнены!";
    } elseif (mb_strlen($name, 'UTF8') < 2) {
        $status_message['name'] = "Название должно содержать не менее 3х символов!";
    } elseif (selectOne('categories', ["name" => $name])) {
        $status_message['name'] = "Указанная категория существует!";
    } elseif (mb_strlen($description, 'UTF8') < 2) {
        $status_message['description'] = "Описание должно содержать не менее !!!х символов!";
    } else {
        $category = [
            "name" => $name,
            "description" => $description
        ];

        insert('categories', $category);

        $status_message['success'] = "Категория <b>$name</b> успешно создана!";
        $name = '';
        $description = '';
    }
}


/** Получение данных категории для вставки в форму на странице Редактировние категории **/
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($segments[2]) && $segments[2] === 'edit' && isset($segments[3])) {
    $category = selectOne('categories', ["id" => $id]);

    $name = $category['name'];
    $description = $category['description'];
}


/** Обработчик формы Редактрования категории **/
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-category'])) {
    // Прверка полей формы на ошибки
    if ($name === '' || $description === '') {
        $status_message['more'] = "Не все поля заполнены!";
    } elseif (mb_strlen($name, 'UTF8') < 2) {
        $status_message['name'] = "Название должно содержать не менее 3х символов!";
    } elseif (mb_strlen($description, 'UTF8') < 2) {
        $status_message['description'] = "Описание должно содержать не менее !!!х символов!";
    } else {
        $category = [
            "name" => $name,
            "description" => $description
        ];

        update('categories', (int)$id, $category);
        $status_message['success'] = "Категория <b>$name</b> успешно отредактирована!";
    }
}


/** Обработчик формы Удаления категории **/
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_delete'])) {
    $id = !empty($_GET['id_delete']) ? htmlspecialchars($_GET['id_delete']) : '';

    if (!empty($id)) {
        $category = selectOne('categories', ["id" => $id]);

        delete('categories', (int)$id);
        header('location: /admin/categories/');
    }
}