<?php
    session_start();
    include_once "path.php";
?>
        <header class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-4 d-flex align-items-center">
                        <a class="logo" href="/">Мой блог</a>
                    </div>
                    <nav class="col-8 d-flex justify-content-end">
                        <ul class="menu">
                            <li class="menu__item"><a href="#">Главная</a></li>
                            <li class="menu__item"><a href="#">О нас</a></li>
                            <li class="menu__item"><a href="#">Услуги</a></li>
                            <li class="menu__item"><a href="#">Контакты</a></li>
                            <li class="menu__item">
                                <?php if (isset($_SESSION['id'])): ?>
                                <a href="#">
                                    <i class="fa fa-user fa-sm"></i>
                                    <?= $_SESSION['login']; ?>
                                </a>
                                <ul class="menu sub-menu">
                                    <?php if ($_SESSION['admin']): ?>
                                    <li class="menu__item"><a href="<?= BASE_URL.'admin/'; ?>">Админ панель</a></li>
                                    <? endif; ?>
                                    <li class="menu__item"><a href="<?= BASE_URL.'logout.php'; ?>">Выход</a></li>
                                </ul>
                                <? else: ?>
                                <a href="<?= BASE_URL.'login.php'; ?>"><i class="fa fa-user fa-sm"></i> Вход</a>
                                <ul class="menu sub-menu">
                                    <li class="menu__item"><a href="<?= BASE_URL.'reg.php'; ?>">Регистрация</a></li>
                                </ul>
                                <? endif; ?>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
