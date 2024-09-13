<?php

chekAdmin();

$userId = $_SESSION['user_Id'];

$sql = "SELECT * FROM article";
$stmt = $pdo->query($sql);
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);


require_once('templates/adminpanel/admin.php');
