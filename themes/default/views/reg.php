<?php
    include "../src/controllers/UserController.php";
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
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/assets/css/style.css">
</head>
<body>
    <div class="wrapper">
        <? get_header(); ?>
        <main>
            <section class="content">
                <div class="container">
                    <section class="auth-reg">
                        <form class="col-12 col-md-4 m-auto" method="post">
                            <h2 class="title">Регистрация</h2>
                            <? if (!empty($status_message['success'])) echo "<p class='success'>{$status_message['success']}</p>"?>
                            <div class="mb-3">
                                <label for="exampleInputLogin" class="form-label">Логин</label>
                                <input type="text" class="form-control" id="exampleInputLogin" name="login" value="<?=$login?>" placeholder="Введите логин">
                                <? if (!empty($status_message['login'])) echo "<p class='error'>{$status_message['login']}</p>" ?>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="<?=$email?>" placeholder="Введите email">
                                <div id="emailHelp" class="form-text">Мы никогда никому не передадим вашу электронную почту.</div>
                                <? if (!empty($status_message['email'])) echo "<p class='error'>{$status_message['email']}</p>" ?>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Введите пароль">
                                <? if (!empty($status_message['password'])) echo "<p class='error'>{$status_message['password']}</p>" ?>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword2" class="form-label">Подтверждение пароля</label>
                                <input type="password" class="form-control" id="exampleInputPassword2" name="password2" placeholder="Введите пароль еще раз" >
                                <? if (!empty($status_message['password2'])) echo "<p class='error'>{$status_message['password2']}</p>" ?>
                            </div>
                            <div class="mb-3">
                                <? if (!empty($status_message['more'])) echo "<p class='error'>{$status_message['more']}</p>" ?>
                            </div>
                            <button type="submit" class="btn btn-secondary w-100" name="button-reg">Зарегистириоваться</button>
                            <p class="desc">Можете <a href="<?= BASE_URL.'login.php'; ?>">авторизоваться</a>, если у вас есть аккаунт!</p>
                        </form>
                    </section>
                </div>
            </section>
        </main>
        <? get_footer(); ?>
    </div>

    <script src="https://kit.fontawesome.com/8f44be9bba.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>