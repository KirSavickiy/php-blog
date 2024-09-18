<?php

chekUser();

$userId = $_SESSION['user_Id'];
$articleId = $_GET['id'] ?? null;

if (count($_POST)) {
    $content = $_POST['content'] ?? null;
    $sql = "INSERT INTO comment SET userId = :userId, articleId = :articleId, content = :content, createdAt = NOW();";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'userId'=> $userId,
        'articleId'=> $articleId,
        'content'=> $content,
    ]);

    header("Location: ?act=view&id={$articleId}");
    die();

}
