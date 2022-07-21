<?php
    $categories = selectAll('categories');
?>
<footer class="container-fluid">
    <div class="container">
        <div class="row">
            <section class="about col-md-6 col-12">
                <h3 class="title">
                    <a class="logo" href="/">Мой блог</a>
                </h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae eveniet iusto porro praesentium voluptatem. Aut blanditiis ducimus explicabo harum id molestiae nulla placeat quod tempora voluptatum? Inventore, obcaecati quisquam! Eligendi.
                </p>
                <div class="contacts">
                    <a href="#">
                        <i class="fa fa-phone"></i>
                        123-456-999
                    </a>
                    <a href="#">
                        <i class="fa fa-envelope"></i>
                        info@myblog.com
                    </a>
                </div>
                <div class="soc-links">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div>
            </section>
            <section class="links col-md-3 col-12">
                <h4 class="title">Категории</h4>
                <ul>
                    <? foreach ($categories as $category): ?>
                        <li><a href="/category/<?=$category['name']?>"><?=$category['name']?></a></li>
                    <? endforeach; ?>
                </ul>
            </section>
            <section class="feedback col-md-3 col-12">
                <h4 class="title">Обратная связь</h4>
                <form action="" method="post">
                    <input type="text" name="email" placeholder="Введите почту...">
                    <textarea name="message" placeholder="Введите сообщение..."></textarea>
                    <button type="submit">
                        <i class="fa fa-envelope"></i>
                        Отправить
                    </button>
                </form>
            </section>
        </div>
        <div class="footer-bottom row">
            <p>&copy; myblog.com | Designed by <a href="https://t.me/Rasul_Mountain" target="_blank">Rasul Sulaev</a></p>
        </div>
    </div>
</footer>
