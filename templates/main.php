<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Блог</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <!-- Шапка -->
  <?php
  require_once 'header.php';
  ?>

  <!-- Баннер -->
  <!-- <section class="banner">
        <div class="container">
            <h2>Добро пожаловать в мой блог!</h2>
            <p>Здесь вы найдете интересные статьи на различные темы.</p>
        </div>
    </section> -->

  <!-- Основной контент -->
  <div class="container">
    <main>
      <?php foreach ($posts as $post): ?>
        <article class="post-preview">
          <img class="img-main" src="<?= $post['img']?>" alt="Изображение статьи 1">
          <h3><a href="#"><?=htmlspecialchars($post['title']) ?></a></h3>
          <p>Краткое описание статьи 1...</p>
          <div class="post-buttons">
            <a href="?act=view&id=<?=$post['id']?>" class="button-view">Смотреть</a>
            <?php if (!empty($_SESSION['user_Id']) && $_SESSION['user_Id'] == $post['userId']): ?>
              <a href="?act=edit&id=<?php echo $post['id']?>" class="button-edit">Редактировать</a>
                <?php endif; ?>
          </div>
        </article>
      <?php endforeach; ?>

      <!-- Добавь больше статей по мере необходимости -->
    </main>

    <!-- Боковая панель -->
    <aside>
      <section>
        <h3>Категории</h3>
        <ul>
          <li><a href="#">Категория 1</a></li>
          <li><a href="#">Категория 2</a></li>
        </ul>
      </section>
      <section>
        <h3>Популярные посты</h3>
        <ul>
          <li><a href="#">Популярная статья 1</a></li>
          <li><a href="#">Популярная статья 2</a></li>
        </ul>
      </section>
      <section>
        <h3>Поиск</h3>
        <input type="text" placeholder="Поиск по блогу...">
      </section>
    </aside>
  </div>

  <!-- Футер -->
  <?php
  require_once 'footer.php';
  ?>

</body>

</html>