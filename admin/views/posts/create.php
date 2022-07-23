<?php
    include ROOT_PATH . "/src/controllers/admin/PostsController.php";
?>
<div class="main-content col-12 col-md-9">
    <? get_admin_content_manager_bar($segments[1]); ?>
    <div class="add-post">
        <h2 class="posts-title">Добавление нового поста</h2>
        <form class="col-12 m-auto" action="create.php" method="post" enctype="multipart/form-data">
            <? if (!empty($status_message['success'])) echo "<p class='success'>{$status_message['success']}</p>"?>
            <div class="mb-3">
                <label class="form-label">Название</label>
                <input type="text" class="form-control" name="title" value="<?=$title?>" placeholder="Введите название поста">
                <? if (!empty($status_message['title'])) echo "<p class='error'>{$status_message['title']}</p>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Содержание поста</label>
                <textarea class="form-control" id="editor" rows="10" name="content" placeholder="Введите содержимое поста"><?=$content?></textarea>
                <? if (!empty($status_message['content'])) echo "<p class='error'>{$status_message['content']}</p>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Картинка</label>
                <input class="form-control" type="file" name="img">
                <? if (!empty($status_message['img'])) echo "<p class='error'>{$status_message['img']}</p>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Категория поста</label>
                <select class="form-select" name="category">
                    <option value="1" selected disabled>Выберите категорию поста</option>
                    <? foreach ($categories as $item): ?>
                    <option value="<?=$item['id']?>" <? if ($item['id'] === $category) echo "selected"; ?>><?=$item['name']?></option>
                    <? endforeach; ?>
                </select>
                <? if (!empty($status_message['category'])) echo "<p class='error'>{$status_message['category']}</p>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Статус публикации</label>
                <select class="form-select" name="status">
                    <option value="N" <? if ($status === "N") echo "selected"; ?>>Не опубликовать</option>
                    <option value="P" <? if ($status === "P") echo "selected"; ?>>Опубликовать</option>
                    <option value="D" <? if ($status === "D") echo "selected"; ?>>В черновик</option>
                </select>
            </div>
            <div class="mb-3">
                <? if (!empty($status_message['more'])) echo "<p class='error'>{$status_message['more']}</p>"; ?>
            </div>
            <button type="submit" class="btn btn-success w-100" name="create-post">Добавить пост</button>
        </form>
    </div>
</div>