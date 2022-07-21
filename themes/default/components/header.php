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
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Главная</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">О нас</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Услуги</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Контакты</a></li>
                    <li class="nav-item dropdown">
                        <?php if (isset($_SESSION['id'])): ?>
                        <a class="nav-link dropdown-toggle" href="" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user fa-sm"></i>
                            <?= $_SESSION['login']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <?php if ($_SESSION['role'] === 'admin'): ?>
                            <li><a class="dropdown-item" href="/admin">Админ панель</a></li>
                            <? endif; ?>
                            <li><a class="dropdown-item" href="/logout/">Выход</a></li>
                        </ul>
                        <? else: ?>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user fa-sm"></i>
                            Авторизация
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="/login/">Вход</a></li>
                            <li><a class="dropdown-item" href="/reg/">Регистрация</a></li>
                        </ul>
                        <? endif; ?>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
