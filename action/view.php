<?php

$id = $_GET['id'] ?? null;
$stmt = $pdo->prepare("SELECT * FROM article WHERE id = :id;");
$stmt->execute([
    'id' => $id
]);
$post= $stmt->fetch(PDO::FETCH_ASSOC);
require_once('templates/view.php');
