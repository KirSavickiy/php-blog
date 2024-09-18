<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить Пост</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Шапка (можно использовать ту же шапку, что и на главной странице) -->
    <?php
  require_once 'header.php';
  ?>

    <!-- Основной контент -->
    <div class="container">
        <div class="add-post-container">
            <h2>Добавить новый пост</h2>
            <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="act" value="add"/>
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="category">Категория</label>
                    <select id="category" name="category" required>
                        <option value="">Выберите категорию</option>
                        <option value="Категория 1">Категория 1</option>
                        <option value="Категория 2">Категория 2</option>
                        <!-- Добавь больше категорий по необходимости -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Содержание</label>
                    <textarea id="content" name="content" rows="10" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Изображение</label>
                    <input type="file" id="image" name="image" accept="image/*">
                </div>
                <button type="submit">Опубликовать</button>
            </form>
        </div>
    </div>

    <!-- Футер (можно использовать тот же футер, что и на главной странице) -->
    <?php
  require_once 'footer.php';
  ?>
</body>
</html>
