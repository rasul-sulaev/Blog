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
                            <div class="single_post">
                                <h2 class="single_post__title">Прикольные статья на тему динамического сайта</h2>
                                <div class="single_post__info">
                                    <i class="fa fa-user"> Имя Автора</i>
                                    <i class="fa fa-calendar"> Март 11, 2019</i>
                                </div>
                                <img class="single_post__img col-12" src="https://blog.templatetoaster.com/wp-content/uploads/2020/05/Bootstrap-5-Facebbok.png" alt="">
                                <div class="single_post__text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Amet aperiam asperiores autem eligendi eos esse eum excepturi, facere,
                                    fugit iste magnam minima nam obcaecati odit quod ratione rerum soluta voluptatem.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Amet aperiam asperiores autem eligendi eos esse eum excepturi, facere,
                                    fugit iste magnam minima nam obcaecati odit quod ratione rerum soluta voluptatem.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Amet aperiam asperiores autem eligendi eos esse eum excepturi, facere,
                                    fugit iste magnam minima nam obcaecati odit quod ratione rerum soluta voluptatem.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Amet aperiam asperiores autem eligendi eos esse eum excepturi, facere,
                                    fugit iste magnam minima nam obcaecati odit quod ratione rerum soluta voluptatem.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Amet aperiam asperiores autem eligendi eos esse eum excepturi, facere,
                                    fugit iste magnam minima nam obcaecati odit quod ratione rerum soluta voluptatem.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Amet aperiam asperiores autem eligendi eos esse eum excepturi, facere,
                                    fugit iste magnam minima nam obcaecati odit quod ratione rerum soluta voluptatem.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Amet aperiam asperiores autem eligendi eos esse eum excepturi, facere,
                                    fugit iste magnam minima nam obcaecati odit quod ratione rerum soluta voluptatem.</p>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar col-12 col-md-3" style="padding-top: 26px">
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
                                        <li><a href="#">Прграммирование</a></li>
                                        <li><a href="#">Дизайн</a></li>
                                        <li><a href="#">Визуализация</a></li>
                                        <li><a href="#">Кейсы</a></li>
                                        <li><a href="#">Мотивация</a></li>
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