 <?php
 
$id = (int)$_GET['id'] ?? null;
$categoryArticles = getCategoryArticles($pdo, $id);



// if ($_GET['id']){
//     $sql = "SELECT * FROM article WHERE category_id = ? LIMIT 10";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute([$id]);
//     $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// }
if ($_GET['id']){
    $posts = getArticlesCategory($id, $pdo);
}

require_once 'templates/main.php';

