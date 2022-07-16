<?php
    include_once "../../path.php";
    include SITE_ROOT."/app/controllers/admin/CommentsController.php";
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
                                <h2 class="posts-title">Управление комментариями</h2>
                                <table class="table table-light table-bordered table-striped table-hover">
                                    <thead class="table-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Текст</th>
                                        <th scope="col">Пост</th>
                                        <th scope="col">Автор</th>
                                        <th scope="col">Дата создания</th>
                                        <th scope="col">Опубликован</th>
                                        <th scope="col">Управление</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <? foreach ($commentsAll as $comment): ?>
                                        <tr scope="row">
                                            <th><?=$comment['id']?></th>
                                            <td><a href="#"><?=
                                                    strlen($comment['comment']) >= 50 ?
                                                        mb_substr($comment['comment'], 0, 50, 'UTF8').'...' :
                                                        $comment['comment'];
                                                    ?></a>
                                            </td>
                                            <td>
                                                <a href="/post.php?id=<?=$comment['id_post']?>">Перейти</a>
                                            </td>
                                            <th>
                                                <?=$comment['username']?> <br>
                                                <a href="#"><?=$comment['email']?></a>
                                            </th>
                                            <td>
                                                <?=$comment['createdAt']?>
                                            </td>
                                            <td class="text-center">
                                                <form action="edit.php" method="GET">
                                                    <input type="hidden" name="id_comment_for_change_status" value="<?=$comment['id']?>">
                                                    <input class="form-check-input" type="checkbox" name="status" <? if (!empty($comment['status'])) echo 'checked'?> onchange="this.form.submit()">
                                                </form>
                                            </td>
                                            <td>
                                                <a href="edit.php?id=<?=$comment['id']?>">edit</a> |
                                                <a href="edit.php?delete_id=<?=$comment['id']?>">delete</a>
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