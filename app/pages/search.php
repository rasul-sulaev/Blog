<?php
    include "app/controllers/SearchController.php";
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
                    <div class="row">
                        <div class="main-content col-12 col-md-9">
                            <div class="posts">
                                <? if (empty($results)): ?>
                                <h1>Error 404</h1>
                                <h3>По ваще запросу: <i><?=$query;?></i> ничего не найдено :(</h3>
                                <? else: ?>
                                <h2 class="mb-4">Резултаты поиска:</h2>
                                <? foreach ($results as $post): ?>
                                <div class="post row">
                                    <img class="post__img col-12 col-md-4" src="<?=BASE_URL."/uploads/img/posts/".$post['img']?>" alt="">
                                    <div class="post__text col-12 col-md-8">
                                        <a class="post__title" href="/post/<?=$post['id']?>/"><?=
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
                                            <a href="/category/<?=$post['category_name']?>/"><?=$post['category_name']?></a>
                                        </span>
                                        </div>
                                        <p class="post__preview-text"><?=
                                            strlen($post['content']) >= 350 ?
                                            mb_substr($post['content'], 0, 350, 'UTF8').'...' :
                                            $post['content'];
                                        ?></p>
                                    </div>
                                </div>
                                <?endforeach; ?>
                                <? endif; ?>
                            </div>
                        </div>
                        <?php include "app/components/sidebar.php"; ?>
                    </div>
                </div>
            </section>
        </main>
        <?php include "app/components/footer.php"; ?>
    </div>

    <script src="https://kit.fontawesome.com/8f44be9bba.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>