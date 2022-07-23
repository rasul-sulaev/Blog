<?php
    include ROOT_PATH."/src/controllers/admin/CategoriesController.php";
?>
<div class="main-content col-12 col-md-9">
    <? get_admin_content_manager_bar($segments[1]); ?>
    <div class="add-post">
        <h2 class="posts-title">Добавление новой категории</h2>
        <form class="col-12 m-auto" action="create.php" method="post">
            <? if (!empty($status_message['success'])) echo "<p class='success'>{$status_message['success']}</p>"?>
            <div class="mb-3">
                <label class="form-label">Название</label>
                <input type="text" class="form-control" name="name" value="<?=$name?>" placeholder="Введите название категории" required>
                <? if (!empty($status_message['name'])) echo "<p class='error'>{$status_message['name']}</p>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Описание категории</label>
                <textarea class="form-control" rows="10" name="description" placeholder="Введите описание категории"><?=$description?></textarea>
                <? if (!empty($status_message['description'])) echo "<p class='error'>{$status_message['description']}</p>"; ?>
            </div>
            <div class="mb-3">
                <? if (!empty($status_message['more'])) echo "<p class='error'>{$status_message['more']}</p>"; ?>
            </div>
            <button type="submit" class="btn btn-success w-100" name="create-category" >Создать категорию</button>
        </form>
    </div>
</div>