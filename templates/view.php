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
        <h1><?= htmlspecialchars($post['title']) ?></h1>
        <img src="img/post-image.jpg" alt="Изображение поста">
        <div class="post-content">
          <p><?= htmlspecialchars($post['content']) ?></p>
        </div>
        <div class="post-actions">
          <a href="?act=edit&id=<?php echo $article['id'] ?>" class="button-edit">Редактировать пост</a>
          <a href="/php-blog" class="button-back">Назад к списку</a>
        </div>
      </article>
      <div class="comments-section">
        <h2>Комментарии</h2>
        <ul class="comments-list">
        </ul>
      </div>

      <!-- Форма для добавления комментария -->
      <div class="comments-section">
        <!-- Пример комментария -->
        <div class="comment">
          <div class="comment-avatar">
            <img src="icons/avatar.jpg" alt="Аватар" class="avatar">
          </div>
          <div class="comment-content">
            <strong>Имя автора</strong>
            <p>Текст комментария...</p>
          </div>
        </div>

        <!-- Форма для добавления нового комментария -->
        <div class="comment-form">
          <h3>Оставить комментарий</h3>
          <form action="comment.php" method="POST">

            <label for="content">Комментарий:</label>
            <textarea id="content" name="content" rows="4" required></textarea>

            <button type="submit">Отправить</button>
          </form>
        </div>
      </div>


      <!-- Футер -->
      <?php require_once 'footer.php'; ?>
</body>

</html>