<?php
require_once 'header.php';
?>
        </head>
        <body>
        <div class="content">
            <h2>Manage Posts</h2>

            <table>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                 <?php foreach($articles as $article): ?>
                <tr>
                    <td><?= $article['title'] ?></td>
                    <td><?= $article['createdAt'] ?></td>
                    <td>
                        <a href="?act=adminedit&id=<?= $article['id']?>" class="btn">Edit</a>
                        <a href="?act=admindelete&id=<?= $article['id']?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

</body>
</html>
