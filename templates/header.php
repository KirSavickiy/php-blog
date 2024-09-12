<header>
    <div class="container">
        <h1 class="logo">Мой блог</h1>
        <nav>
            <ul class="main-nav">
                <li><a href="/php-blog">Главная</a></li>
                <li><a href="?act=add">Добавить пост</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>
            <ul class="auth-nav">
                <li><a href="?act=profile" class="btn-profile">Мой профиль</a></li>
                <?php if (!empty($_SESSION['user_Id'])): ?>
                    <li><a href="?act=logout" class="btn-login">Выход</a></li>
                <?php endif; ?>
                <?php if (empty($_SESSION['user_Id'])): ?>
                    <li><a href="?act=login" class="btn-login">Вход</a></li>
                <?php endif; ?>
                <li><a href="?act=register" class="btn-register">Зарегистрироваться</a></li>
            </ul>
        </nav>
    </div>
</header>