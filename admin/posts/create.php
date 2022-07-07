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
        <?php include "../../app/include/header-admin.php"; ?>
        <main>
            <section class="content">
                <div class="container h-100">
                    <div class="row h-100">
                        <? include "../include/sidebar.php"; ?>
                        <div class="main-content col-12 col-md-9">
                            <div class="d-flex gap-2 my-3">
                                <a class="btn btn-success w-auto" href="<?= BASE_URL.'admin/posts/create.php'; ?>">Добавить</a> <br>
                                <a class="btn btn-warning w-auto" href="<?= BASE_URL.'admin/posts/'; ?>">Редактировать</a>
                            </div>
                            <div class="add-post">
                                <h2 class="posts-title">Добавление нового поста</h2>
                                <form class="col-12 m-auto" action="create.php" method="post">
                                    <div class="mb-3">
                                        <label class="form-label">Название</label>
                                        <input type="email" class="form-control" name="title" value="" placeholder="Введите название поста" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Содержание поста</label>
                                        <textarea class="form-control" id="editor" rows="10" name="text" placeholder="Введите содержимое поста" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Картинка</label>
                                        <input class="form-control" id="file" type="file">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Категория поста</label>
                                        <select class="form-select" name="categories" id="">
                                            <option value="1" selected disabled>Выберите категорию поста</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success w-100" name="button-create-post" value="send">Добавить пост</button>
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
    <script src="../../assets/js/main.js"></script>
</body>
</html>