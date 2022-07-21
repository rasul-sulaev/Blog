<?php
    include "app/controllers/admin/CommentsController.php";
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
    <link rel="stylesheet" href="/themes/default/assets/css/admin.css">
</head>
<body>
    <div class="wrapper">
        <? include "app/components/admin-header.php"; ?>
        <main>
            <section class="content">
                <div class="container h-100">
                    <div class="row h-100">
                        <? include "app/components/admin-sidebar.php"; ?>
                        <div class="main-content col-12 col-md-9">
                            <div class="add-post">
                                <h2 class="posts-title">Редактрирование комментария</h2>
                                <form class="col-12 m-auto" method="post">
                                    <? if (!empty($status_message['success'])) echo "<p class='success'>{$status_message['success']}</p>"?>
                                    <input type="hidden" name="id" value="<?=$id?>">
                                    <div class="mb-3">
                                        <label class="form-label">Комментарий</label>
                                        <textarea class="form-control" rows="10" name="comment" placeholder="Введите комментарий"><?=$comment?></textarea>
                                        <? if (!empty($status_message['comment'])) echo "<p class='error'>{$status_message['comment']}</p>"; ?>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Статус модерации</label> <br>
                                        <input class="form-check-input" type="checkbox" id="ch" name="status" <? if (!empty($status)) echo 'checked'?>>
                                        <label class="form-label" for="ch">Опубликовать</label>
                                    </div>
                                    <div class="mb-3">
                                        <? if (!empty($status_message['more'])) echo "<p class='error'>{$status_message['more']}</p>"; ?>
                                    </div>
                                    <button type="submit" class="btn btn-success w-100" name="edit-comment">Сохранить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script src="https://kit.fontawesome.com/8f44be9bba.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="/themes/default/assets/js/main.js"></script>
</body>
</html>