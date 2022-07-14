<?php
include_once "path.php";
include_once SITE_ROOT . "/app/controllers/admin/PostsController.php";

// Данные
$category_name = isset($_GET['name']) ? htmlspecialchars(trim($_GET['name'])) : NULL;

// Категории
$category = selectOne('categories', ["name" => $category_name]);

// Массив опубликованных постов относящиеся к данной категории
$posts = selectAllFromPostWithUser('users', 'posts', 'categories', "WHERE cat.name = '$category_name' AND p.status = 'P' ORDER BY p.createdAt DESC");
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
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="wrapper">
        <?php include('app/include/header.php'); ?>
        <main>
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="main-content col-12 col-md-9">
                            <? if (empty($category)): ?>
                            <div class="posts">
                                <h1>Error 404</h1>
                                <h2 class="single_post__title">Ничего не найдено</h2>
                            </div>
                            <? else: ?>
                            <div class="posts">
                                <h2>Категория: <?=$category['name']?></h2>
                                <blockquote class="mb-4"><?=$category['description']?></blockquote>
                                <? if (count($posts) === 1): ?>
                                <p style="font-style: italic">Найден: 1 пост</p>
                                <? elseif (count($posts) >= 2 && count($posts) < 5): ?>
                                <p style="font-style: italic">Найдено: <?=count($posts)?> поста</p>
                                <? else: ?>
                                <p style="font-style: italic">Найдено: <?=count($posts )?> постов</p>
                                <? endif; ?>
                                <? foreach ($posts as $post): ?>
                                    <div class="post row">
                                        <img class="post__img col-12 col-md-4" src="<?=BASE_URL."/uploads/img/posts/".$post['img']?>" alt="">
                                        <div class="post__text col-12 col-md-8">
                                            <a class="post__title" href="<?= BASE_URL."post.php?id=".$post['id']?>"><?=
                                                strlen($post['title']) >= 100 ?
                                                mb_substr($post['title'], 0, 100, 'UTF8').'...' :
                                                $post['title'];
                                            ?></a>
                                            <div class="post__info">
                                                <span>
                                                    <i class="fa fa-user"></i>
                                                    <?=$post['username']?>
                                                </span>
                                                <span>
                                                    <i class="fa fa-calendar"></i>
                                                    <?=$post['createdAt']?>
                                                </span>
                                                <span>
                                                    <i class="fa fa-folder"></i>
                                                    <?=$post['category_name']?>
                                                </span>
                                            </div>
                                            <p class="post__preview-text">
                                                <?=
                                                strlen($post['content']) >= 350 ?
                                                mb_substr($post['content'], 0, 350, 'UTF8').'...' :
                                                $post['content'];
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                <? endforeach; ?>
                            </div>
                            <? endif; ?>
                        </div>
                        <?php include_once "app/include/sidebar.php"; ?>
                    </div>
                </div>
            </section>
        </main>
        <?php include "app/include/footer.php"; ?>
    </div>

    <script src="https://kit.fontawesome.com/8f44be9bba.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>