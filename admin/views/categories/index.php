<?php
    include ROOT_PATH."/src/controllers/admin/CategoriesController.php";
?>
<div class="main-content col-12 col-md-9">
    <div class="posts">
        <h2 class="posts-title">Управление категориями</h2>
        <? get_admin_content_manager_bar($segments[1]); ?>
        <table class="table table-light table-bordered table-striped table-hover">
            <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                <? foreach ($categories as $category): ?>
                <tr scope="row">
                    <th><?=$category['id']?></th>
                    <td><a href="/category/<?=$category['name']?>/"><?=$category['name']?></a></td>
                    <td>
                        <a href="/admin/categories/edit/<?=$category['id']?>/">edit</a> |
                        <a href="/admin/categories/edit/?id_delete=<?=$category['id']?>">delete</a>
                    </td>
                </tr>
                <? endforeach; ?>
            </tbody>
        </table>
    </div>
</div>