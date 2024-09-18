<?php

chekUser();

$userId = $_SESSION['user_Id'];
$sql = "SELECT * FROM article WHERE userId = :userId";
$stmt=$pdo->prepare($sql);
$stmt->execute([
    'userId' => $userId
    ]);

$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);


require_once('templates/articles.php');
