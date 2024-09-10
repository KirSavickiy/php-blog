<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Просмотр поста</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <!-- Шапка -->
  <?php require_once 'header.php'; ?>

  <!-- Основной контент -->
  <div class="container">
    <div class="post-view">
      <article>
        <h1><?=htmlspecialchars($post['title']) ?></h1>
        <img src="img/post-image.jpg" alt="Изображение поста">
        <div class="post-content">
          <p><?=htmlspecialchars($post['content']) ?></p>
        </div>
        <div class="post-actions">
          <a href="?act=edit&id=<?php echo $article['id']?>" class="button-edit">Редактировать пост</a>
          <a href="/php-blog" class="button-back">Назад к списку</a>
        </div>
      </article>
    </div>
  </div>

  <!-- Футер -->
  <?php require_once 'footer.php'; ?>
</body>

</html>
