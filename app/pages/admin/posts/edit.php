<?php
    include "app/controllers/admin/PostsController.php";
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
    <link rel="stylesheet" href="/assets/css/admin.css">
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
                            <div class="d-flex gap-2 my-3">
                                <a class="btn btn-success w-auto" href="/admin/posts/create/">Добавить</a> <br>
                                <a class="btn btn-warning w-auto" href="/admin/posts/">Редактировать</a>
                            </div>
                            <div class="add-post">
                                <h2 class="posts-title">Редактирование поста</h2>
                                <form class="col-12 m-auto" method="post" enctype="multipart/form-data">
                                    <? if (!empty($status_message['success'])) echo "<p class='success'>{$status_message['success']}</p>"?>
                                    <div class="mb-3">
                                        <label class="form-label">Название</label>
                                        <input type="text" class="form-control" name="title" value="<?=$title?>" placeholder="Введите название поста">
                                        <? if (!empty($status_message['title'])) echo "<p class='error'>{$status_message['title']}</p>"; ?>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Содержание поста</label>
                                        <textarea class="form-control" id="editor" rows="10" name="content" placeholder="Введите содержимое поста"><?=$content?></textarea>
                                        <? if (!empty($status_message['content'])) echo "<p class='error'>{$status_message['content']}</p>"; ?>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Картинка</label>
                                        <? if (!empty($img)): ?>
                                        <br>
                                        <img src="<?=BASE_URL."/uploads/img/posts/".$img?>" width="200" alt="">
                                        <br>
                                        <br>
                                        <? endif; ?>
                                        <input class="form-control" type="file" name="img">
                                        <? if (!empty($status_message['img'])) echo "<p class='error'>{$status_message['img']}</p>"; ?>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Категория поста</label>
                                        <select class="form-select" name="category">
                                            <option value="1" selected disabled>Выберите категорию поста</option>
                                            <? foreach ($categories as $item): ?>
                                            <option value="<?=$item['id']?>" <? if ($item['id'] == $category) echo "selected"; ?>><?=$item['name']?></option>
                                            <? endforeach; ?>
                                        </select>
                                        <? if (!empty($status_message['category'])) echo "<p class='error'>{$status_message['category']}</p>"; ?>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Статус публикации</label>
                                        <br>
                                        <select class="form-select" name="status">
                                            <option value="N" <? if ($status === "N") echo "selected"; ?>>Не опубликовать</option>
                                            <option value="P" <? if ($status === "P") echo "selected"; ?>>Опубликовать</option>
                                            <option value="D" <? if ($status === "D") echo "selected"; ?>>В черновик</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <? if (!empty($status_message['more'])) echo "<p class='error'>{$status_message['more']}</p>"; ?>
                                    </div>
                                    <button type="submit" class="btn btn-success w-100" name="edit-post">Сохранить</button>
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
    <script src="/assets/js/main.js"></script>
</body>
</html>