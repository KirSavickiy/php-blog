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
    <?php
    $totalPages = count($pages);  // Общее количество страниц
    $currentPage = $_GET['page'] ?? 1;  // Текущая страница
    $startPage = max(1, $currentPage - 2);  // Начало диапазона страниц
    $endPage = min($totalPages, $currentPage + 2);  // Конец диапазона страниц

    // Отображаем кнопки предыдущей страницы
    if ($currentPage > 1) {
        echo '<a href="?act=admin&page='.($currentPage - 1).'" class="page-link">‹ Предыдущая</a>';
    }

    // Отображаем диапазон страниц
    if ($startPage > 1) {
        echo '<a href="?act=admin&page=1" class="page-link">1</a>';
        echo '<span class="page-link">...</span>';
    }

    for ($page = $startPage; $page <= $endPage; $page++) {
        if ($page == $currentPage) {
            echo '<span class="page-link active">'.$page.'</span>';
        } else {
            echo '<a href="?act=admin&page='.$page.'" class="page-link">'.$page.'</a>';
        }
    }

    if ($endPage < $totalPages) {
        echo '<span class="page-link">...</span>';
        echo '<a href="?act=admin&page='.$totalPages.'" class="page-link">'.$totalPages.'</a>';
    }

    // Отображаем кнопку следующей страницы
    if ($currentPage < $totalPages) {
        echo '<a href="?act=admin&page='.($currentPage + 1).'" class="page-link">Следующая ›</a>';
    }
    ?>

    <a href="?act=admin&page=<?= $totalPages ?>" class="page-link">Последняя »</a>
</div>
 </footer>



</html>
