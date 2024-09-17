<?php

chekUser();

$userId = $_SESSION['user_Id'];
$id = $_GET['id'] ?? null;

$stmt = $pdo->prepare("SELECT * FROM article WHERE id = :id AND userId = :userId ;");
$stmt->execute([
    'id' => $id,
    'userId' => $userId
]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

$errors = "";

if (count($_POST)){
    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;
    $stmt = $pdo->prepare("SELECT img FROM article WHERE id = :id; ");
    $stmt->execute(['id' => $id]);
    $path = $stmt->fetch(PDO::FETCH_ASSOC);
    $filePath = $path['img'];

    if ($filePath != null){
        deleteFile($filePath);
    }

    $pdo->prepare("UPDATE article SET img = NULL WHERE id = :id;")->execute([
        'id' => $id
    ]);

    $status = uploadImage();
    $errors = $status['status'];
    $img = $status["path"] ?? null;
    $stmt = $pdo->prepare("UPDATE article SET title = :title, content = :content, img = :img  WHERE id = :id AND userId =  :userId;");
    $stmt->execute([
        'title'=> $title,
        'content'=> $content,
        'img'=> $img,
        'id' => $id,
        'userId' => $userId
    ]);
    if(empty($errors)){
        header('Location: /php-blog');
    die();
}
    
}

require_once('templates/edit.php');