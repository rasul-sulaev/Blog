<?php

?>
<div class="main-content col-12 col-md-9">
    <? get_admin_content_manager_bar($segments[1]); ?>
    <div class="add-post">
        <h2 class="posts-title">Добавление новой темы</h2>
        <form class="col-12 m-auto" method="post" enctype="multipart/form-data">
            <? if (!empty($status_message['success'])) echo "<p class='success'>{$status_message['success']}</p>"?>
            <div class="mb-3">
                <label class="form-label">Архив</label>
                <input class="form-control" type="file" name="file" accept="application/zip">
                <? if (!empty($status_message['file'])) echo "<p class='error'>{$status_message['file']}</p>"; ?>
            </div>
            <div class="mb-3">
                <? if (!empty($status_message['more'])) echo "<p class='error'>{$status_message['more']}</p>"; ?>
            </div>
            <button type="submit" class="btn btn-success w-100" name="add-theme">Добавить тему</button>
        </form>
    </div>
</div>
