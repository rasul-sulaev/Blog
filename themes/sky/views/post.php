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
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/assets/css/media.css">
</head>
<body>
<div class="wrapper">
    <? get_header(); ?>
    <main>
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="main-content col-12 col-md-9">
                        <div class="single_post">
                            <h2 class="single_post__title"><?=$post['title']?></h2>
                            <div class="single_post__info">
                                <span><i class="fa fa-user"></i><?=$post['username']?></span>
                                <span><i class="fa fa-calendar"></i><?=$post['createdAt']?></span>
                                <span><i class="fa fa-folder"></i><a href="/category/<?=$post['category_name']?>/"><?=$post['category_name']?></a></span>
                            </div>
                            <img class="single_post__img col-12" src="/uploads/img/posts/<?=$post['img'];?>" alt="">
                            <div class="single_post__text"><?=$post['content']?></div>
                        </div>
                        <?php include THEME_DIR."/components/comments.php"; ?>
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
<script src="/admin/assets/js/main.js"></script>
</body>
</html>