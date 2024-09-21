<?php

chekUser();

$userId = $_SESSION['user_Id'];
$categories = getAllCategories($pdo);


if (count($_POST)) {
    $status = uploadImage();

    $title = $_POST['title'] ?? null;
    $category_id = $_POST['category'] ?? null;
    $content = $_POST['content'] ?? null;
    $img = $status["path"] ?? null;

    $sql = "INSERT INTO article SET userId = :userId, title = :title, content = :content, img = :img, createdAt = NOW(), category_id = :category_id;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'userId'=> $userId,
        'title'=> $title,
        'content'=> $content,
        'img'=> $img,
        'category_id' => $category_id
    ]);


    header('Location: ?act=articles');
    die();

}

require_once('templates/add.php');
