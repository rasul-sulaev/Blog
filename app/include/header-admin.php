<?php
    session_start();
    include_once "{$_SERVER['DOCUMENT_ROOT']}/path.php";
?>
<header class="container-fluid">
    <div class="container">
        <nav class="navbar col-8 d-flex justify-content-between navbar-expand-lg w-100">
            <div class="col-4 d-flex align-items-center">
                <a class="logo" href="/">Мой блог</a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user fa-sm"></i>
                            <?= $_SESSION['login']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="<?= BASE_URL.'logout.php'; ?>">Выход</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
