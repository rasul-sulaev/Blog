<?php
    // Массив ТОП постов (slider)
    $top_posts = selectAll('posts', ['top_post' => 1]);

    // Пагинация
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;

    // Исключение символов, кроме цифр в параметре page
    if (preg_match('/^[0-9]+$/', $page)) {
        $offset = ($page - 1) * $limit;
    } else {
        require get_template_directory_uri()."/views/404.php";
        exit();
    }

    // Количество страниц в пагинации
    $total_pages = ceil(countRow('posts', "WHERE status = 'P'") / $limit);

    // Массив опубликованных постов
    $posts = selectAllFromPostWithUser('users', 'posts', 'categories', "WHERE p.status = 'P' ORDER BY p.createdAt DESC LIMIT $limit OFFSET $offset");
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
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/assets/css/style.css">
</head>
<body>
    <div class="wrapper">
        <? get_header(); ?>
        <main>
            <section class="slider">
                <div class="container">
                    <? if ($top_posts): ?>
                    <div class="row">
                        <h2 class="slider-title">Топ публикации</h2>
                    </div>
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <? foreach ($top_posts as $key => $post): ?>
                            <div class="carousel-item <? if ($key === 0) echo 'active'; ?>">
                                <img src="/uploads/img/posts/<?=$post['img']?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <a class="title" href="post/<?=$post['id']?>/"><?=
                                        strlen($post['title']) >= 100 ?
                                        mb_substr($post['title'], 0, 100, 'UTF8').'...' :
                                        $post['title'];
                                    ?></a>
                                </div>
                            </div>
                            <? endforeach; ?>
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
                <? endif; ?>
            </section>
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="main-content col-12 col-md-9">
                            <div class="posts">
                                <h2 class="mb-4">Последние публикации</h2>
                                <? get_posts_for_content($posts); ?>
                            </div>
                            <? if ($total_pages > 1): ?>
                            <nav class="mt-4" aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="?page=1" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <? for ($i=1; $i<=$total_pages; ++$i): ?>
                                        <li class="page-item <? if ($page == $i) echo "active";?>"><a class="page-link" href="?page=<?="$i"?>"><?=$i?></a></li>
                                    <? endfor; ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?=$total_pages; ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <? endif; ?>
                        </div>
                        <? get_sidebar(); ?>
                    </div>
                </div>
            </section>
        </main>
        <? get_footer(); ?>
    </div>

    <script src="https://kit.fontawesome.com/8f44be9bba.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>