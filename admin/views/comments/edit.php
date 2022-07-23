<?php
    include ROOT_PATH."/src/controllers/admin/CommentsController.php";
?>
<div class="main-content col-12 col-md-9">
    <div class="add-post">
        <h2 class="posts-title">Редактрирование комментария</h2>
        <form class="col-12 m-auto" method="post">
            <? if (!empty($status_message['success'])) echo "<p class='success'>{$status_message['success']}</p>"?>
            <input type="hidden" name="id" value="<?=$id?>">
            <div class="mb-3">
                <label class="form-label">Комментарий</label>
                <textarea class="form-control" rows="10" name="comment" placeholder="Введите комментарий"><?=$comment?></textarea>
                <? if (!empty($status_message['comment'])) echo "<p class='error'>{$status_message['comment']}</p>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Статус модерации</label> <br>
                <input class="form-check-input" type="checkbox" id="ch" name="status" <? if (!empty($status)) echo 'checked'?>>
                <label class="form-label" for="ch">Опубликовать</label>
            </div>
            <div class="mb-3">
                <? if (!empty($status_message['more'])) echo "<p class='error'>{$status_message['more']}</p>"; ?>
            </div>
            <button type="submit" class="btn btn-success w-100" name="edit-comment">Сохранить</button>
        </form>
    </div>
</div>