<?php

chekAdmin();
$userId = $_SESSION['user_Id'];

$stmt_2 = $pdo->query("SELECT COUNT(*) AS total FROM article;");
$count = $stmt_2->fetch(PDO::FETCH_ASSOC);
$endpage = ceil($count['total'] / 20);
$pages = range(1, $endpage);


if (isset($_GET['page']) && ($_GET['page'] >= 2) && ($_GET['page'] <= end($pages))) {
    $offset = (int) ($_GET['page'] * 20 - 20);
    $sql = "SELECT * FROM article ORDER BY createdAt DESC LIMIT 20 OFFSET :offset";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $sql = "SELECT * FROM article ORDER BY createdAt DESC LIMIT 20;";
    $stmt = $pdo->query($sql);
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

require_once('templates/adminpanel/admin.php');
