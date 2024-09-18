<?php

chekAdmin();
$id = $_GET['id'] ?? null;

if ($_GET['id']){
    $stmt_1 = $pdo->prepare("SELECT img FROM article WHERE id = :id; ");
    $stmt_1->execute(['id' => $id]);
    $path = $stmt_1->fetch(PDO::FETCH_ASSOC);
    $filePath = $path['img'];
    if ($filePath != null){
        deleteFile($filePath);
    }

    $sql = "DELETE FROM article WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $id
    ]);


    header('Location: ?act=admin');
    die();
}
