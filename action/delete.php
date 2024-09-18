<?php

chekUser();

$userId = $_SESSION['user_Id'];
$id = $_GET['id'] ?? null;

if ($_GET['id']){
    $sql = "DELETE FROM article WHERE id = :id AND userId =  :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $id,
        'userId' => $userId

    ]);
    // $mysqli->query();
    header('Location: ?act=articles');
    die();
}
