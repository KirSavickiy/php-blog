<?php

chekUser();

$userId = $_SESSION['user_Id'];

if (count($_POST)) {
    $status = uploadImage();

    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;
    $img = $status["path"] ?? null;

    $sql = "INSERT INTO article SET userId = :userId, title = :title, content = :content, img = :img, createdAt = NOW();";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'userId'=> $userId,
        'title'=> $title,
        'content'=> $content,
        'img'=> $img
    ]);


    header('Location: ?act=articles');
    die();

}

require_once('templates/add.php');
