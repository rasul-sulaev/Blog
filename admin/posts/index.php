<?php
    include_once "../../path.php";
    include SITE_ROOT."/app/controllers/posts.php";
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
                            <div class="posts">
                                <h2 class="posts-title">Управление постами</h2>
                                <div class="d-flex gap-2 my-3">
                                    <a class="btn btn-success w-auto" href="<?= BASE_URL.'admin/posts/create.php'; ?>">Добавить</a> <br>
                                    <a class="btn btn-warning w-auto" href="<?= BASE_URL.'admin/posts/'; ?>">Редактировать</a>
                                </div>
                                <table class="table table-light table-bordered table-striped table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Название</th>
                                            <th scope="col">Категория</th>
                                            <th scope="col">Автор</th>
                                            <th scope="col">Дата публикации</th>
                                            <th scope="col">Статус</th>
                                            <th scope="col">Редактировать</th>
                                            <th scope="col">Удалить</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <? foreach ($userPosts as $post): ?>
                                        <tr scope="row">
                                            <th><?=$post['id_post']?></th>
                                            <td><a href="<?=BASE_URL.'posts/'.$post['id_post']?>"><?=$post['title']?></a></td>
                                            <td><?=$post['category_name']?></td>
                                            <td><?=$post['username']?></td>
                                            <td><?=$post['createdAt']?></td>
                                            <td>
                                                <? if ($post['status'] === 'P') {
                                                    echo "Опубликован";
                                                } elseif ($post['status'] === 'N') {
                                                    echo "Не опубликован";
                                                } elseif ($post['status'] === 'D') {
                                                    echo "Черновик";
                                                }?>
                                            </td>
                                            <td><a href="#">edit</a></td>
                                            <td><a href="#">delete</a></td>
                                        </tr>
                                        <? endforeach; ?>
                                    </tbody>
                                </table>
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