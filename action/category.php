 <?php
 
$id = (int)$_GET['id'] ?? null;
$categoryArticles = getCategoryArticles($pdo, $id);

if ($_GET['id']){
    $posts = getArticles($currentPage, $pages, $numberOfArticlesPerPage, $pdo, $id, $userID);
}

require_once 'templates/main.php';

