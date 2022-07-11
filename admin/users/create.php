<?php
    include_once "../../path.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Finlandica:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body>
    <div class="wrapper">
        <?php include("../../app/include/header-admin.php"); ?>
        <main>
            <section class="content">
                <div class="container h-100">
                    <div class="row h-100">
                        <? include "../include/sidebar.php"; ?>
                        <div class="main-content col-12 col-md-9">
                            <div class="d-flex gap-2 my-3">
                                <a class="btn btn-success w-auto" href="<?= BASE_URL.'admin/users/create.php'; ?>">Добавить</a> <br>
                                <a class="btn btn-warning w-auto" href="<?= BASE_URL.'admin/users/'; ?>">Редактировать</a>
                            </div>
                            <div class="add-post">
                                <h2 class="posts-title">Добавление нового пользователя</h2>
                                <form class="col-12 m-auto" action="create.php" method="post">
                                    <div class="mb-3">
                                        <label for="exampleInputLogin" class="form-label">Логин</label>
                                        <input type="text" class="form-control" id="exampleInputLogin" name="login" placeholder="Введите логин">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Введите email">
<!--                                        --><?// if (!empty($status_message['email'])) echo "<p class='error'>{$status_message['email']}</p>" ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Введите пароль">
<!--                                        --><?// if (!empty($status_message['password'])) echo "<p class='error'>{$status_message['password']}</p>" ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword2" class="form-label">Подтверждение пароля</label>
                                        <input type="password" class="form-control" id="exampleInputPassword2" name="password2" placeholder="Введите пароль еще раз" >
<!--                                        --><?// if (!empty($status_message['password2'])) echo "<p class='error'>{$status_message['password2']}</p>" ?>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Роль</label>
                                        <select class="form-select" name="categories" id="">
                                            <option selected disabled>Выберите роль пользователя</option>
                                            <option value="Admin">Admin</option>
                                            <option value="User">User</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success w-100" name="button-create-post" value="send">Создать</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="https://kit.fontawesome.com/8f44be9bba.js" crossorigin="anonymous"></script>
</body>
</html>