<?php
    include ROOT_PATH."/src/controllers/admin/UsersController.php";
?>
<div class="main-content col-12 col-md-9">
    <? get_admin_content_manager_bar($segments[1]); ?>
    <div class="add-post">
        <h2 class="posts-title">Добавление нового пользователя</h2>
        <form class="col-12 m-auto" action="create.php" method="post">
            <? if (!empty($status_message['success'])) echo "<p class='success'>{$status_message['success']}</p>"?>
            <div class="mb-3">
                <label for="exampleInputLogin" class="form-label">Логин</label>
                <input type="text" class="form-control" id="exampleInputLogin" name="login" value="<?=$login?>" placeholder="Введите логин">
                <? if (!empty($status_message['login'])) echo "<p class='error'>{$status_message['login']}</p>" ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?=$email?>" aria-describedby="emailHelp" placeholder="Введите email">
                <? if (!empty($status_message['email'])) echo "<p class='error'>{$status_message['email']}</p>" ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Введите пароль">
                <? if (!empty($status_message['password'])) echo "<p class='error'>{$status_message['password']}</p>" ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">Подтверждение пароля</label>
                <input type="password" class="form-control" id="exampleInputPassword2" name="password2" placeholder="Введите пароль еще раз" >
                <? if (!empty($status_message['password2'])) echo "<p class='error'>{$status_message['password2']}</p>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Роль</label>
                <select class="form-select" name="role">
                    <option selected disabled>Выберите роль пользователя</option>
                    <option value="admin" <? if ($role === 'admin') echo "selected"; ?>>Админ</option>
                    <option value="user" <? if ($role === 'user') echo "selected"; ?>>Пользователь</option>
                </select>
                <? if (!empty($status_message['role'])) echo "<p class='error'>{$status_message['role']}</p>" ?>
            </div>
            <div class="mb-3">
                <? if (!empty($status_message['more'])) echo "<p class='error'>{$status_message['more']}</p>"; ?>
            </div>
            <button type="submit" class="btn btn-success w-100" name="create-user">Создать</button>
        </form>
    </div>
</div>