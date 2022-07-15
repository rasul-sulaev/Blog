<?php
    include_once "path.php";
    include SITE_ROOT."/app/controllers/admin/CommentsController.php";
?>
<div id="comments" class="col-md-12 col-12 comments mt-5">
    <h3 class="mb-3">Оставить комментарий</h3>
    <? if (!isset($_SESSION['id'])): ?>
    <blockquote class="comments-blocked">
    <p class="not">Только авторизованные пользователи могут оставлять комментарии. <a href="/login.php">Войдите</a>, пожалуйста!</p>
    </blockquote>
    <? else: ?>
    <form action="#comments" method="post">
        <? if (!empty($status_message['success'])) echo "<p class='success'>{$status_message['success']}</p>"?>
        <input type="hidden" name="id_post" value="<?=$id_post?>">
        <div class="mb-3">
            <!--            <label class="form-label">Комментарий</label>-->
            <textarea class="form-control" name="comment" rows="5" placeholder="Напишите комментарий"><?=$comment?></textarea>
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

<!--    <h3>Комментарии к записи</h3>-->
<!--    <div>Список комментариев</div>-->
</div>