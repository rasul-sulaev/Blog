<?php
    include_once "path.php";
    include SITE_ROOT . "/app/controllers/admin/PostsController.php";
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
            <section class="slider">
                <div class="container">
                    <div class="row">
                        <h2 class="slider-title">Топ публикации</h2>
                    </div>
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://miro.medium.com/max/1200/1*RuPWuJwZ97_yCQtbFChfhg.png" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <a class="title" href="">Метка первого слайда</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://fuzeservers.ru/wp-content/uploads/e/d/9/ed962793db647bb4d7178fabe85da2d6.jpeg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <a class="title" href="">Метка первого слайда</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://blog.templatetoaster.com/wp-content/uploads/2020/05/Bootstrap-5-Facebbok.png" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <a class="title" href="">Метка первого слайда</a>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Предыдущий</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Следующий</span>
                        </button>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="main-content col-12 col-md-9">
                            <div class="posts">
                                <h2>Последние публикации</h2>
                                <?
                                foreach ($userPosts as $post):
                                    if ($post['status'] === 'P'):
                                ?>
                                <div class="post row">
                                    <img class="post__img col-12 col-md-4" src="<?=BASE_URL."/uploads/img/posts/".$post['img']?>" alt="">
                                    <div class="post__text col-12 col-md-8">
                                        <a class="post__title" href="<?= BASE_URL."post/".$post['id_post']?>"><?=$post['title']?></a>
                                        <div class="post__info">
                                            <span>
                                                <i class="fa fa-user"></i>
                                                <?=$post['username']?>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar"></i>
                                                <?=$post['createdAt']?>
                                            </span>
                                        </div>
                                        <p class="post__preview-text"><?=$post['content']?></p>
                                    </div>
                                </div>
                                <?
                                    endif;
                                endforeach;
                                ?>
                            </div>
                        </div>
                        <div class="sidebar col-12 col-md-3">
                            <div class="content">
                                <section class="search">
                                    <h4 class="title">Поиск</h4>
                                    <form action="" method="get">
                                        <input type="text" name="search-term" class="form-control" placeholder="Найти...">
                                    </form>
                                </section>
                                <section class="categories">
                                    <h4 class="title">Категории</h4>
                                    <ul>
                                        <? foreach ($categories as $category): ?>
                                        <li><a href="#"><?=$category['name']?></a></li>
                                        <? endforeach; ?>
                                    </ul>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php include("app/include/footer.php"); ?>
    </div>

    <script src="https://kit.fontawesome.com/8f44be9bba.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>