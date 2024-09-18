<?php
require_once 'header.php';

?>
        <body>
        <div class="content">

            <table>
                <tr>
                    <th> Название статьи</th>
                    <th>Дата создания</th>
                    <th></th>
                </tr>
                 <?php foreach($articles as $article): ?>
                <tr>
                    <td><?= $article['title'] ?></td>
                    <td><?= $article['createdAt'] ?></td>
                    <td>
                        <a href="?act=adminedit&id=<?= $article['id']?>" class="btn">Изменить</a>
                        <a href="?act=admindelete&id=<?= $article['id']?>" class="btn btn-danger">Удалить</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <div class="pagination">
        <a href="?act=admin&page=1" class="page-link">« Начало</a>
         <!-- <?php  foreach ($pages as $page):?> -->
        <a href="?act=admin&page=<?=$page?>" class="page-link"><?=$page?></a>
            <?php endforeach; ?>
             <?php if ($_GET['page'] < $endpage): ?>
        <a href="?act=admin&page=<?= ($_GET['page'] ?? 1) + 1; ?>" class="page-link">Следующая ›</a>
            <?php endif; ?>
        <a href="?act=admin&page=<?= end($pages); ?>" class="page-link">Последняя »</a>
    </div>

</body>
</html>
