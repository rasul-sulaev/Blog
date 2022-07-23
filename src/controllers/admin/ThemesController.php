<?php

/** Массив из всех Тем **/
$themes = selectAll('themes');


/** Обработка формы Редактирования Статуса Темы **/
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_for_status'])) {
    $id = isset($_GET['id_for_status']) ? htmlspecialchars(trim($_GET['id_for_status'])) : '';
    $active_theme = !empty($_GET['active_theme']) ? htmlspecialchars($_GET['active_theme']) : '';

    // Прверка полей формы на ошибки
    if (!$post = selectOne('themes', ["id" => $id])) {
        die("Error 404 - Не существует такая тема!");
    } else {
        // Обновление поля `status` в таблице `posts` БД
        updateTheme('themes', NULL, ["status" => NULL]);
        updateTheme('themes', $id, ["status" => 1]);

        header('location: /admin/themes/');
    }
}



/** Обработчик формы Удаления темы **/
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_delete'])) {
    $id = !empty($_GET['id_delete']) ? htmlspecialchars($_GET['id_delete']) : '';

    if (!empty($id)) {
        $theme = selectOne('themes', ["id" => $id]);

        if (!$theme['status'] && $theme['name'] !== 'default') {
            // Удаление записи из БД
            delete('themes', (int)$id);

            // Удаление темы с сервера
            $theme_name = ROOT_PATH.'/themes/'.$theme['name'];
            rmdir($theme_name);
        }
        header('location: /admin/themes/');
    }
}