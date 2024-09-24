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
        <?php if (!empty($post['img'])):?>
        <img src="<?= $post['img'] ?>" alt="Изображение поста"> 
        <?php endif; ?>
        <div class="post-content">
          <p><?= htmlspecialchars($post['content']) ?></p>
        </div>
        <div class="post-actions">
        <?php if (!empty($_SESSION['user_Id']) && $_SESSION['user_Id'] == $post['userId']): ?>
          <a href="?act=edit&id=<?=$post['id'] ?>" class="button-edit">Редактировать пост</a>
          <?php endif; ?>
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
        <?php foreach ($comments as $comment): ?>
          <div class="comment">
            <div class="comment-avatar">
              <img src="icons/avatar.jpg" alt="Аватар" class="avatar">
            </div>
            <div class="comment-content">
              <?php if (empty($comment['name'])): ?>
                <strong>Без Имени</strong>   
                <?php endif; ?>
              <strong><?= htmlentities($comment['name'])?></strong>
              <p><?= htmlentities($comment['content'])?></p>
            </div>
          </div>
        <?php endforeach; ?>
        <!-- Форма для добавления нового комментария -->
        <?php if (!empty($_SESSION['user_Id'])): ?>
          <div class="comment-form">
            <h3>Оставить комментарий</h3>
            <form action="" method="POST">
              <input type="hidden" name="act" value="comment" />
              <label for="content">Комментарий:</label>
              <textarea id="content" name="content" rows="4" required></textarea>
              <button type="submit">Отправить</button>
            </form>
          </div>
      </div>
    <?php else: ?>
      <h3>Чтобы оставить комментарий войдите или зарегистрируйтесь</h3>
    <?php endif; ?>

    <!-- Футер -->
    <?php require_once 'footer.php'; ?>
</body>

</html>