<?php
    include_once "path.php";
    $categories = selectAll('categories');
?>
<div class="sidebar col-12 col-md-3">
    <div class="content">
        <section class="search">
            <h4 class="title">Поиск</h4>
            <form action="search.php" method="get">
                <input type="text" name="query" class="form-control" placeholder="Найти...">
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