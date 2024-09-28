<?php


$id = $_GET['id'] ?? null;
$stmt = $pdo->prepare("SELECT * FROM article WHERE id = :id;");
$stmt->execute([
    'id' => $id
]);
$post= $stmt->fetch(PDO::FETCH_ASSOC);

$articleId = $post['id'];

///comments 

$sql_2 = "SELECT user.name, comment.content FROM user RIGHT JOIN comment ON user.id=comment.userId WHERE comment.articleId = ? AND comment.isActive = 1;";
$stmt_2 = $pdo->prepare($sql_2);
$stmt_2->execute ([$articleId]);
$comments = $stmt_2->fetchAll(PDO::FETCH_ASSOC);
$sql_3 = "UPDATE article SET view = view  + 1 WHERE id = :id;";
$stmt3 = $pdo->prepare($sql_3);
$stmt3->execute([
    ':id' => $id
]);


require_once('templates/view.php');
