<?php
    include "app/controllers/UserController.php";
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
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="wrapper">
        <?php include "app/components/header.php"; ?>
        <main>
            <section class="content">
                <div class="container">
                    <section class="auth-reg">
                        <form class="col-12 col-md-4 m-auto" method="post">
                            <h2 class="title">Авторизация</h2>
                            <? if (!isset($_SESSION[$email]['blocked-time-start'])): ?>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Почта</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?= $email ;?>" placeholder="Введите почту...">
                                <? if (!empty($status_message['email'])) echo "<p class='error'>{$status_message['email']}</p>" ?>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword" class="form-label">Пароль</label>
                                <input type="password" class="form-control" id="exampleInputPassword" name="password" placeholder="Введите пароль...">
                                <? if (!empty($status_message['password'])) echo "<p class='error'>{$status_message['password']}</p>" ?>
                                <? if (!empty($_SESSION[$email])) echo "<p class='error'>Количество попыток: <b>{$_SESSION[$email]['count']} из 3</b></p>" ?>
                            </div>
                            <div class="mb-3">
                                <? if (!empty($status_message['more'])) echo "<p class='error'>{$status_message['more']}</p>" ?>
                            </div>
                            <button type="submit" class="btn btn-secondary w-100" name="button-login" value="send">Войти</button>
                            <p class="desc">Можете <a href="<?= BASE_URL.'reg.php'; ?>">зарегистрироваться</a>, если у вас нет аккаунта!</p>
                            <? else: ?>
                            <div class="mb-3">
                                <h5 class="error">Доступ к форме входа запрещен до <?= gmdate('H:i:s', $_SESSION[$email]['blocked-time-end'] + 10800); ?></h5>
                            </div>
                            <? endif; ?>
                        </form>
                    </section>
                </div>
            </section>
        </main>
        <?php include "app/components/footer.php"; ?>
    </div>

    <script src="https://kit.fontawesome.com/8f44be9bba.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>