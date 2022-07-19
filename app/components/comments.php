<?php
    include "app/controllers/admin/CommentsController.php";
?>
<div id="comments" class="col-md-12 col-12 comments pt-5">
    <h3 class="mb-3">Оставить комментарий</h3>
    <? if (!isset($_SESSION['id'])): ?>
    <blockquote class="comments-blocked">
    <p class="not">Только авторизованные пользователи могут оставлять комментарии. <a href="/app/pages/login.php">Войдите</a>, пожалуйста!</p>
    </blockquote>
    <? else: ?>
    <form action="#comments" method="post">
        <? if (!empty($status_message['success'])) echo "<p class='success'>{$status_message['success']}</p>"?>
        <input type="hidden" name="id_post" value="<?=$id_post?>">
        <div class="mb-3">
            <textarea class="form-control" name="comment" rows="5" placeholder="Введите комментарий"><?=$comment?></textarea>
            <? if (!empty($status_message['comment'])) echo "<p class='error'>{$status_message['comment']}</p>"; ?>
        </div>
        <div class="mb-3">
            <? if (!empty($status_message['more'])) echo "<p class='error'>{$status_message['more']}</p>"; ?>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-secondary w-100" style="border-radius: 0" name="send-comment">Отправить</button>
        </div>
    </form>
    <? endif; ?>


    <? if (count($comments) > 0): ?>
    <div class="all-comments mt-5">
        <h4 class="mb-3">Комментарии <span>(<?=count($comments)?>)</span></h4>
        <? foreach ($comments as $comment): ?>
            <div class="comment col-12">
                <div class="comment__info">
                    <span><i class="fa fa-user"></i>
                        <?=$comment['username']?>
                        <? if ($comment['user_role'] === 'admin'): ?>
                        <span class='this-admin'>Админ</span>
                        <? elseif ($comment['id_user'] === $_SESSION['id']): ?>
                        <span class='this-you'>Вы</span>
                        <? endif; ?>
                    </span>
                    <span class="date"><i class="fa fa-calendar-days" style="margin-left: auto"></i><? $date = date_parse($comment['createdAt']); echo "{$date['day']}.{$date['month']}.{$date['year']}"?></span>
                </div>
                <div class="comment__text"><?=$comment['comment']?></div>
            </div>
        <? endforeach; ?>
    </div>
    <? endif; ?>
</div>