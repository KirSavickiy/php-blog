<?php

chekAdmin();

$id = $_GET['id'] ?? null;

$stmt = $pdo->prepare("SELECT * FROM article WHERE id = :id;");
$stmt->execute([
    'id' => $id
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


    $stmt_1 = $pdo->prepare("UPDATE article SET img = NULL WHERE id = :id;");
    $stmt_1->execute([
        'id' => $id
    ]);
    

    $status = uploadImage();
    $errors = $status['status'];
    $img = $status["path"];
    $stmt = $pdo->prepare("UPDATE article SET title = :title, content = :content, img = :img  WHERE id = :id;");
    $stmt->execute([
        'title'=> $title,
        'content'=> $content,
        'img'=> $img,
        'id' => $id
    ]);

    if(empty($errors)){
        header('Location: /php-blog/?act=admin');
    die();
}
    
}

require_once('templates/adminpanel/edit.php');