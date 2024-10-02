<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Блог</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    .post-views,
    .post-likes {
      display: inline-block;
      margin-right: 10px;
    }

    .post-likes i {
      cursor: pointer;
    }

    .liked {
      color: red;
    }
  </style>
</head>

<body>
  <!-- Header -->
  <?php require_once 'header.php'; ?>



  <div class="container">
    <main>
      <?php foreach ($posts as $post): ?>
        <article class="post-preview">
          <?php if (!empty($post['img'])): ?>
            <img class="img-main" src="<?= $post['img'] ?>" alt="Изображение статьи">
          <?php endif; ?>
          <h3><a href="?act=view&id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h3>
          <div class="post-meta">
            <span class="post-date">Дата: <?= date('d.m.Y', strtotime($post['createdAt'])) ?></span> |
            <span class="post-author">Автор: <?= $post['author'] ?></span>
          </div>
          <div class="post-views">
            <i class="fas fa-eye"></i> <?= $post['view'] ?> просмотров
          </div>

          <div class="post-likes">
            <i class="fas fa-heart<?= $post['likeState'] ? ' liked' : '' ?>" data-id="<?= $post['id'] ?>"
              onclick="toggleLike(<?= $post['id'] ?>, event)"></i>
            <div id="error-message-<?= $post['id'] ?>"
              style="display: none; position: absolute; background-color: red; color: white; padding: 10px; border-radius: 5px;">
              Понравилась статья? Войдите в аккаунт, чтобы поставить отметку.
            </div>
            <span id="like-count-<?= $post['id'] ?>"><?= $post['like'] ?></span> лайков
          </div>


          <div class="post-buttons">
            <a href="?act=view&page=<?= $currentPage ?>&id=<?= $post['id'] ?>" class="button-view">Смотреть</a>
            <?php if (!empty($_SESSION['user_Id']) && $_SESSION['user_Id'] == $post['userId']): ?>
              <a href="?act=edit&id=<?= $post['id'] ?>" class="button-edit">Редактировать</a>
            <?php endif; ?>
          </div>
        </article>
      <?php endforeach; ?>
      <!-- Pagination -->
      <div class="pagination">
        <?php if (!empty($pages)): ?>
          <a href="?act&page=1" class="page-link">&laquo Начало</a>
          <?php foreach ($pages as $page): ?>
            <a href="?act&page=<?= (int) $page ?>" class="page-link active"><?= $page ?></a>
          <?php endforeach; ?>
          <a href="?act&page=<?= $currentPage + 1 ?>" class="page-link">Следующая &raquo </a>
        <?php endif; ?>
      </div>
    </main>

    <!-- Боковая панель -->
    <aside>
      <section>
        <h3>Категории</h3>
        <ul>
          <?php foreach ($categories as &$category): ?>
            <li><a
                href="?act=category&id=<?= $category['id'] ?>&<?= $category['translit'] ?>"><?= $category['title'] ?></a>
            </li>
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
  <?php require_once 'footer.php'; ?>
</body>

<script>
function toggleLike(postId, event) {
    const heartIcon = document.querySelector(`i[data-id='${postId}']`);
    const likeCount = document.getElementById(`like-count-${postId}`);
    const isLiked = heartIcon.classList.contains('liked');
    const errorMessage = document.getElementById(`error-message-${postId}`);

    fetch('action/like.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            post_id: postId,
            liked: !isLiked  
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Сетевая ошибка');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            if (isLiked) {
                heartIcon.classList.remove('liked');
                likeCount.textContent = Math.max(0, parseInt(likeCount.textContent) - 1);
            } else {
                heartIcon.classList.add('liked');
                likeCount.textContent = (parseInt(likeCount.textContent) + 1) || 1;
            }
            errorMessage.style.display = 'none'; 
        } else {
            console.error('Ошибка при обновлении лайка:', data.error);
            showError(errorMessage);
        }
    })
    .catch(error => {
        console.error('Ошибка:', error);
        showError(errorMessage);
    });
}

function showError(errorMessage) {
    errorMessage.style.display = 'block';
    setTimeout(() => {
        errorMessage.style.display = 'none'; 
    }, 3000);
}


</script>



</html>