<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Редактирование поста</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <!-- Шапка -->
  <?php require_once 'header.php'; ?>

  <!-- Основной контент -->
  <div class="container">
    <div class="post-container">
      <h1>Редактирование поста</h1>
      <form method="post" enctype="multipart/form-data">
      <input type="hidden" name="act" value="adminedit"/>
        <div class="form-group">
          <label for="title">Название поста</label>
          <input type="text" id="title" name="title" value="<?=$post['title']; ?>" required>
        </div>
        <div class="form-group">
          <label for="content">Содержание поста</label>
          <textarea id="content" name="content" rows="10" required> <?=$post['content']; ?> </textarea>
        </div>
        <div class="form-group">
          <label for="image">Изображение поста</label>
          <input type="file" id="image" name="image" accept="image/*">
        </div>
        <div class="form-actions">
          <button type="submit" class="button-save">Сохранить</button>
        </div>
      </form>
    </div>
  </div>
  <!-- Вывод ошибок -->
  <?php if (!empty($errors)): ?>
          <div class="form-errors">
            <ul>
                <li><?php echo htmlspecialchars($errors); ?></li>
            </ul>
          </div>
        <?php endif; ?>
      </form>
    </div>
  </div>

  <!-- Футер -->
</body>

</html>
