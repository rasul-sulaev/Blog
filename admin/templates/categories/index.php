<?php
    include "app/controllers/admin/CategoriesController.php";
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
        <? include "app/components/admin-header.php"; ?>
        <main>
            <section class="content">
                <div class="container h-100">
                    <div class="row h-100">
                        <? include "app/components/admin-sidebar.php"; ?>
                        <div class="main-content col-12 col-md-9">
                            <div class="posts">
                                <h2 class="posts-title">Управление категориями</h2>
                                <div class="d-flex gap-2 my-3">
                                    <a class="btn btn-success w-auto" href="/admin/templates/categories/create/">Добавить</a> <br>
                                    <a class="btn btn-warning w-auto" href="/admin/templates/categoriescategories">Редактировать</a>
                                </div>
                                <table class="table table-light table-bordered table-striped table-hover">
                                    <thead class="table-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Название</th>
                                        <th scope="col">Управление</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <? foreach ($categories as $category): ?>
                                        <tr scope="row">
                                            <th><?=$category['id']?></th>
                                            <td><a href="/category/<?=$category['name']?>/"><?=$category['name']?></a></td>
                                            <td>
                                                <a href="/admin/categories/edit/<?=$category['id']?>/">edit</a> |
                                                <a href="/admin/templates/categories/edit/?id_delete=<?=$category['id']?>">delete</a>
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