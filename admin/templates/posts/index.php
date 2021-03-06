<?php
    include "src/controllers/admin/PostsController.php";
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
    <link rel="stylesheet" href="../../../themes/default/assets/css/admin.css">
</head>
<body>
    <div class="wrapper">
        <?php include "themes/default/components/admin-header.php"; ?>
        <main>
            <section class="content">
                <div class="container h-100">
                    <div class="row h-100">
                        <? include "themes/default/components/admin-sidebar.php"; ?>
                        <div class="main-content col-12 col-md-9">
                            <div class="posts-table">
                                <h2 class="posts-title">Управление постами</h2>
                                <div class="d-flex gap-2 my-3">
                                    <a class="btn btn-success w-auto" href="/admin/templates/posts/create/">Добавить</a> <br>
                                    <a class="btn btn-warning w-auto" href="/admin/templates/postsates/posts">Редактировать</a>
                                </div>
                                <table class="table table-light table-bordered table-striped table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Название</th>
                                            <th scope="col">Категория</th>
                                            <th scope="col">Автор</th>
                                            <th scope="col">Дата создания</th>
                                            <th scope="col">Статус</th>
                                            <th scope="col" class="text-center">ТОП</th>
                                            <th scope="col">Управление</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <? foreach ($userPosts as $post): ?>
                                        <tr scope="row">
                                            <th><?=$post['id']?></th>
                                            <td>
                                                <img src="<?=BASE_URL."/uploads/img/posts/".$post['img']?>" style="width: 40px; height: 40px" alt="">
                                                <a href="/post/<?=$post['id']?>/"><?=
                                                    strlen($post['title']) >= 25 ?
                                                    mb_substr($post['title'], 0, 25, 'UTF8').'...' :
                                                    $post['title'];
                                                ?></a>
                                            </td>
                                            <td><a href="/category/<?=$post['category_name']?>/"><?=$post['category_name']?></a></td>
                                            <td><?=$post['username']?></td>
                                            <td><?=$post['createdAt']?></td>
                                            <td>
                                                <form action="/admin/templates/posts/edit/" method="GET">
                                                    <input type="hidden" name="id" value="<?=$post['id']?>">
                                                    <select class="form-select form-select-sm" name="status" onchange="this.form.submit()">
                                                        <option value="N" <? if ($post['status'] === "N") echo 'selected'; ?>>Не опубликован</option>
                                                        <option value="P" <? if ($post['status'] === "P") echo 'selected'; ?>>Опубликован</option>
                                                        <option value="D" <? if ($post['status'] === "D") echo 'selected'; ?>>В черновик</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td class="text-center">
                                                <form action="/admin/templates/posts/edit/" method="GET">
                                                    <input type="hidden" name="id_for_top" value="<?=$post['id']?>">
                                                    <input class="form-check-input" type="checkbox" name="top_post" <? if ($post['top_post']) echo 'checked'?> onchange="this.form.submit()">
                                                </form>
                                            </td>
                                            <td>
                                                <a href="/admin/posts/edit/<?=$post['id']?>/">edit</a> |
                                                <a href="/admin/templates/posts/edit/?id_delete=<?=$post['id']?>">delete</a>
                                            </td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>