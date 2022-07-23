<?php
    include ROOT_PATH."/src/controllers/admin/CommentsController.php";
?>
<div class="main-content col-12 col-md-9">
    <div class="posts">
        <h2 class="posts-title">Управление комментариями</h2>
        <table class="table table-light table-bordered table-striped table-hover">
            <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Текст</th>
                <th scope="col">Пост</th>
                <th scope="col">Автор</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Опубликован</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                <? foreach ($commentsAll as $comment): ?>
                <tr scope="row">
                    <th><?=$comment['id']?></th>
                    <td><a href="#"><?=
                        strlen($comment['comment']) >= 50 ?
                        mb_substr($comment['comment'], 0, 50, 'UTF8').'...' :
                        $comment['comment'];
                        ?></a>
                    </td>
                    <td>
                        <a href="/post/<?=$comment['id_post']?>#comments">Перейти</a>
                    </td>
                    <th>
                        <?=$comment['username']?> <br>
                        <a href="#"><?=$comment['email']?></a>
                    </th>
                    <td>
                        <?=$comment['createdAt']?>
                    </td>
                    <td class="text-center">
                        <form action="/admin/comments/edit/" method="GET">
                            <input type="hidden" name="id_comment_for_change_status" value="<?=$comment['id']?>">
                            <input class="form-check-input" type="checkbox" name="status" <? if (!empty($comment['status'])) echo 'checked'?> onchange="this.form.submit()">
                        </form>
                    </td>
                    <td>
                        <a href="/admin/comments/edit/<?=$comment['id']?>/">edit</a> |
                        <a href="/admin/comments/edit/?id_delete=<?=$comment['id']?>">delete</a>
                    </td>
                </tr>
                <? endforeach; ?>
            </tbody>
        </table>
    </div>
</div>