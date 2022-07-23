<?php
    include ROOT_PATH . "/src/controllers/admin/PostsController.php";
?>
<div class="main-content col-12 col-md-9">
    <div class="posts-table">
        <h2 class="posts-title">Управление постами</h2>
        <? get_admin_content_manager_bar($segments[1]); ?>
        <table class="table table-light table-bordered table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Название</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Автор</th>
                    <th scope="col">Дата создания</th>
                    <th scope="col">Статус</th>
                    <th scope="col" class="text-center">ТОП</th>
                    <th scope="col">Управление</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <? foreach ($userPosts as $post): ?>
                <tr scope="row">
                    <th><?=$post['id']?></th>
                    <td>
                        <img src="<?=BASE_URL."/uploads/img/posts/".$post['img']?>" style="width: 40px; height: 40px" alt="">
                        <a href="/post/<?=$post['id']?>/"><?=
                            strlen($post['title']) >= 25 ?
                            mb_substr($post['title'], 0, 25, 'UTF8').'...' :
                            $post['title'];
                        ?></a>
                    </td>
                    <td><a href="/category/<?=$post['category_name']?>/"><?=$post['category_name']?></a></td>
                    <td><?=$post['username']?></td>
                    <td><?=$post['createdAt']?></td>
                    <td>
                        <form action="/admin/posts/edit/" method="GET">
                            <input type="hidden" name="id" value="<?=$post['id']?>">
                            <select class="form-select form-select-sm" name="status" onchange="this.form.submit()">
                                <option value="N" <? if ($post['status'] === "N") echo 'selected'; ?>>Не опубликован</option>
                                <option value="P" <? if ($post['status'] === "P") echo 'selected'; ?>>Опубликован</option>
                                <option value="D" <? if ($post['status'] === "D") echo 'selected'; ?>>В черновик</option>
                            </select>
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="/admin/posts/edit/" method="GET">
                            <input type="hidden" name="id_for_top" value="<?=$post['id']?>">
                            <input class="form-check-input" type="checkbox" name="top_post" <? if ($post['top_post']) echo 'checked'?> onchange="this.form.submit()">
                        </form>
                    </td>
                    <td>
                        <a href="/admin/posts/edit/<?=$post['id']?>/">edit</a> |
                        <a href="/admin/posts/edit/?id_delete=<?=$post['id']?>">delete</a>
                    </td>
                </tr>
                <? endforeach; ?>
            </tbody>
        </table>
    </div>
</div>