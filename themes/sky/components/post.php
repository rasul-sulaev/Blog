<div class="posts-list">
<? foreach ($posts as $post): ?>
    <div class="post">
        <img class="post__img col-12" src="<?=BASE_URL."/uploads/img/posts/".$post['img']?>" alt="">
        <div class="post__text col-12">
            <div class="post__info">
                <span><i class="fa fa-user"></i><?=$post['username']?></span>
                <span><i class="fa fa-calendar"></i><? $date = date_parse($post['createdAt']); echo "{$date['day']}.{$date['month']}.{$date['year']}"?></span>
                <span><i class="fa fa-folder"></i><a href="/category/<?=$post['category_name']?>/"><?=$post['category_name']?></a></span>
            </div>
            <a class="post__title" href="/post/<?=$post['id']?>/"><?=
                strlen($post['title']) >= 100 ?
                    mb_substr($post['title'], 0, 100, 'UTF8').'...' :
                    $post['title'];
                ?></a>
            <p class="post__preview-text"><?=
                strlen($post['content']) >= 350 ?
                    mb_substr($post['content'], 0, 350, 'UTF8').'...' :
                    $post['content'];
                ?></p>
        </div>
    </div>
<? endforeach; ?>
</div>
