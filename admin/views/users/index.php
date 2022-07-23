<?php
    include ROOT_PATH."/src/controllers/admin/UsersController.php";
?>
<div class="main-content col-12 col-md-9">
    <div class="posts-table">
        <h2 class="posts-title">Управление пользователями</h2>
        <? get_admin_content_manager_bar($segments[1]); ?>
        <table class="table table-light table-bordered table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Логин</th>
                    <th scope="col">Почта</th>
                    <th scope="col">Дата регистрации</th>
                    <th scope="col">Роль</th>
                    <th scope="col">Управление</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <? foreach ($users as $user): ?>
                <tr scope="row">
                    <th><?=$user['id']?></th>
                    <td><a href="#"><?=$user['username']?></a></td>
                    <td><a href="#"><?=$user['email']?></a></td>
                    <td><?=$user['createdAt']?></td>
                    <td>
                        <form action="/admin/users/edit/" method="GET">
                            <input type="hidden" name="id" value="<?=$user['id']?>">
                            <select name="role" onchange="this.form.submit()">
                                <option value="admin" <? if ($user['role'] === 'admin') echo "selected"; ?>>Админ</option>
                                <option value="user" <? if ($user['role'] === "user") echo "selected"; ?>>Пользователь</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <a href="/admin/users/edit/<?=$user['id']?>/">edit</a> |
                        <a href="/admin/users/edit/?id_delete=<?=$user['id']?>">delete</a>
                    </td>
                </tr>
                <? endforeach; ?>
            </tbody>
        </table>
    </div>
</div>