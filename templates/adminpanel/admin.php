<?php
require_once 'header.php';
?>
<div class="content">
    <table>
        <tr>
            <th>Изображение</th>
            <th>Название статьи</th>
            <th>Дата создания</th>
            <th></th>
        </tr>
        <?php foreach($articles as $article): ?>
        <tr>
            <td>
                <?php if (!empty($article['img'])): ?>
                    <img src="<?= htmlspecialchars($article['img']) ?>" alt="<?= htmlspecialchars($article['title']) ?>" class="article-image">
                <?php else: ?>
                    <img src="icons/default-image.png" alt="Нет изображения" class="article-image">
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($article['title']) ?></td>
            <td><?= htmlspecialchars($article['createdAt']) ?></td>
            <td>
                <a href="?act=adminedit&id=<?= $article['id'] ?>" class="btn">Изменить</a>
                <a href="?act=admindelete&id=<?= $article['id'] ?>" class="btn btn-danger">Удалить</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</div> <!-- Закрытие .admin-container -->
</body>
 <footer>
 <div class="pagination">
    <a href="?act=admin&page=1" class="page-link">« Начало</a>
   <?php require_once 'functions/admin-pagination.php' ?>
    <a href="?act=admin&page=<?= $totalPages ?>" class="page-link">Последняя »</a>
</div>
 </footer>



</html>
