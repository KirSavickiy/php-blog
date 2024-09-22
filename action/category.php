 <?php
 
$id = $_GET['id'] ?? null;

if ($_GET['id']){
    $sql = "SELECT * FROM article WHERE category_id = ? LIMIT 10";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

}

foreach ($posts as &$post){
    $post['author'] = []; 
    $post['author'] = getArticleAuthor($pdo, $post['userId']);
}


require_once 'templates/main.php';

