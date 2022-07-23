<?php
    include ROOT_PATH."/src/controllers/admin/ThemesController.php";
?>
<div class="main-content col-12 col-md-9">
    <div class="posts">
        <h2 class="posts-title">Управление темами сайта</h2>
        <? get_admin_content_manager_bar($segments[1]); ?>
        <table class="table table-light table-bordered table-striped table-hover">
            <thead class="table-light">
            <tr>
                <th scope="col" class="col-9">Название</th>
                <th scope="col">Активировать</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            <? foreach ($themes as $theme): ?>
                <tr scope="row">
                    <td><?=$theme['name']?></td>
                    <td>
                        <form action="/admin/themes/edit/" method="GET" class="text-center">
                            <input type="hidden" name="id_for_status" value="<?=$theme['id']?>">
<!--                            <input class="form-check-input" type="radio" name="top_post" --><?// if ($theme['status']) echo 'checked'?><!-- onchange="this.form.submit()">-->
                            <input class="form-check-input" type="checkbox" name="active_theme" <? if ($theme['status']) echo 'checked'?> onchange="this.form.submit()">
                        </form>
                    </td>
                    <td>
                        <a href="/admin/themes/edit/?id_delete=<?=$theme['id']?>">delete</a>
                    </td>
                </tr>
            <? endforeach; ?>
            </tbody>
        </table>
    </div>
</div>