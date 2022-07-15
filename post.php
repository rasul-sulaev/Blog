<?php
    include_once "path.php";
    include SITE_ROOT.'/app/controllers/PostController.php';
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
                            <? if (empty($post)): ?>
                            <div class="single_post">
                                <h1>Error 404</h1>
                                <h2 class="single_post__title">Ничего не найдено</h2>
                            </div>
                            <? else: ?>
                            <div class="single_post">
                                <h2 class="single_post__title"><?=$post['title']?></h2>
                                <div class="single_post__info">
                                    <span><i class="fa fa-user"></i><?=$post['username']?></span>
                                    <span><i class="fa fa-calendar"></i><?=$post['createdAt']?></span>
                                    <span><i class="fa fa-folder"></i><a href="<?= BASE_URL."category.php?name={$post['category_name']}"; ?>"><?=$post['category_name']?></a></span>
                                </div>
                                <img class="single_post__img col-12" src="<?=BASE_URL."uploads/img/posts/".$post['img'];?>" alt="">
                                <div class="single_post__text"><?=$post['content']?></div>
                            </div>

                            <?php include("app/include/comments.php"); ?>
                            <? endif; ?>
                        </div>
                        <?php include("app/include/sidebar.php"); ?>
                    </div>
                </div>
            </section>
        </main>
        <?php include("app/include/footer.php"); ?>
    </div>

    <script src="https://kit.fontawesome.com/8f44be9bba.js" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>