<?php
error_log("like");
session_start();
require_once '../config/config.php';
require_once '../database/connection.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

error_log(print_r($data, true));

$userID = $_SESSION['user_Id'] ?? null;
$articleID = $data['post_id'] ?? null;
$isLiked = $data['liked'] === true;

error_log("articleID: $articleID, isLiked: $isLiked, userID: $userID"); 


if ($articleID === null || !is_bool($isLiked) || $userID === null) {
    error_log("Проблема с данными: articleID=$articleID, isLiked=$isLiked, userID=$userID");
    echo json_encode(['success' => false, 'error' => 'Неверные данные']);
    exit();
}

try {
    if ($isLiked) {
        $stmt = $pdo->prepare("INSERT INTO likes (userID, articleID) VALUES (:userID, :articleID)");
        $stmt->execute([':userID' => $userID, ':articleID' => $articleID]);
    } else {
        $stmt = $pdo->prepare("DELETE FROM likes WHERE articleID = :articleID AND userID = :userID LIMIT 1");
        $stmt->execute([':articleID' => $articleID, ':userID' => $userID]);
    }
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Ошибка базы данных: ' . $e->getMessage()]);
}
