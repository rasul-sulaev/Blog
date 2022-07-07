<?php

session_start();

require "config_db.php";


function tt($value) {
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

/** Функция для обработки ошибки при работе с бд **/
function queryCheckError($query) {
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
}


/** Запрос на получение всех данных с таблицы **/
function selectAll($table, $params = []) {
    global $db;

    $sql = "SELECT * FROM $table";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'$value'";
            }

            if ($i === 0) {
                $sql .= " WHERE $key = $value";
            } else {
                $sql .= " AND $key = $value";
            }
            $i++;
        }
    }

    $query = $db->prepare($sql);
    $query->execute();
    queryCheckError($query);
    return $query->fetchAll();
}


/** Запрос на получение одной строки с таблицы **/
function selectOne($table, $params = []) {
    global $db;

    $sql = "SELECT * FROM $table";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'$value'";
            }

            if ($i === 0) {
                $sql .= " WHERE $key = $value";
            } else {
                $sql .= " AND $key = $value";
            }
            $i++;
        }
    }

//    $sql .= " LIMIT 2";
    $query = $db->prepare($sql);
    $query->execute();
    queryCheckError($query);
//    return $query->fetchAll();
    return $query->fetch();
}


/**
 * @param $table
 * @param $params
 */
function insert($table, $params) {
    global $db;

    $column = '';
    $mask = '';
    foreach ($params as $key => $value) {
        $column .= ", $key";
        $mask   .= ", :$key";
    }

    $column = substr($column, 2);
    $mask = substr($mask, 2);

    $sql = "INSERT INTO $table ($column) VALUES ($mask)";

//    tt($sql);
//    exit();

    $query = $db->prepare($sql);
    $query->execute($params);
    queryCheckError($query);
    return $db->lastInsertId();
}



/** Обновление строки в таблице БД *
 * @param $table
 * @param $params
 */
function update($table, $id, $params) {
    global $db;

    $sql = "UPDATE $table SET";
    foreach ($params as $key => $value) {
        $sql .= " $key = :$key,";
    }
    $sql = substr($sql, 0, -1) . " WHERE id = $id";

    $query = $db->prepare($sql);
    $query->execute($params);
    queryCheckError($query);
}


/** Удаление строки из таблицы БД *
 * @param $table
 * @param $id
 */
function delete($table, $id) {
    global $db;

    $query = $db->prepare("DELETE FROM $table WHERE id = ?");
    $query->bindParam(1, $id);
    $query->execute();
    queryCheckError($query);
}




//$params = [
//    'username' => 'ras',
//    'email' => 'ras',
//    'password' => '123',
//];
//
//insert('users', $params);