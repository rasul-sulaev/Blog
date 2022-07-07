<?php
session_start();
include_once "{$_SERVER['DOCUMENT_ROOT']}/path.php";
?>
<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4 d-flex align-items-center">
                <a class="logo" href="/">Мой блог</a>
            </div>
            <nav class="col-8 d-flex justify-content-end">
                <ul class="menu">
                    <li class="menu__item">
                        <a href="#">
                            <i class="fa fa-user fa-sm"></i>
                            <?= $_SESSION['login']; ?>
                        </a>
                        <ul class="menu sub-menu">
                            <li class="menu__item"><a href="<?= BASE_URL.'logout.php'; ?>">Выход</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
