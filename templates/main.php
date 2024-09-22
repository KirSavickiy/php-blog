<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Блог</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
  <!-- Шапка -->
  <?php
  require_once 'header.php';
  ?>
  <div class="container">
    <main>
      <?php foreach ($posts as $post): ?>
        <article class="post-preview">
         <?php  if (!empty($post['img'])): ?>
          <img class="img-main" src="<?= $post['img'] ?>" alt="Изображение статьи 1">
          <?php endif ;?>
          <h3><a href="?act=view&id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h3>
          <div class="post-meta">
    <span class="post-date">Дата: <?= date('d.m.Y', strtotime($post['createdAt'])) ?></span> | 
    <span class="post-author">Автор: <?= $post['author'] ?></span>
  </div>
          <div class="post-buttons">
            <a href="?act=view&id=<?= $post['id'] ?>" class="button-view">Смотреть</a>
            <?php if (!empty($_SESSION['user_Id']) && $_SESSION['user_Id'] == $post['userId']): ?>
              <a href="?act=edit&id=<?php echo $post['id'] ?>" class="button-edit">Редактировать</a>
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

          <?php foreach ($categories as &$category):?>
          <li><a href="?act=category&id=<?=$category['id']?>&<?=$category['translit']?>"> <?=$category['title']?> </a></li>
          <?php endforeach; ?>
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
        <div class="search-container">
          <input type="text" placeholder="Поиск по блогу...">
        </div>
      </section>

    </aside>
  </div>

  <!-- Футер -->
  <?php
  require_once 'footer.php';
  ?>

</body>

</html>