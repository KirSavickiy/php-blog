<?php

$currentPage = $_GET['page'] ?? 1;
$numberOfArticlesPerPage = 10;
$numberOfPaginationCells = 5;
$numberOfAllArticles = getAllArticles($pdo);


// $sql = "SELECT COUNT(*) FROM article;";
// $stmt = $pdo->query($sql);
// $numberOfAllArticles = array_values($stmt->fetch(PDO::FETCH_ASSOC));

// $numberOfAllArticles = $numberOfAllArticles[0];
// $numberOfArticlesPerPage = 10;
// $numberOfPaginationCells = 5;
// $offset = $numberOfPaginationCells - 1;
// $numberOfPages = (int) (ceil($numberOfAllArticles / $numberOfArticlesPerPage));
// $endPage = $numberOfPages;
// $currentPage = $_GET['page'] ?? 1;


// if ($currentPage <= 0 || $currentPage > $endPage) {
//     $currentPage = 1;
// }

// if ($numberOfAllArticles <= $numberOfPaginationCells * $numberOfArticlesPerPage && $numberOfAllArticles > $numberOfArticlesPerPage) {
//     $numberOfPaginationCells = (int) ceil($numberOfAllArticles / $numberOfArticlesPerPage);
//     $pages = range(1, $numberOfPaginationCells);
// } else if ($numberOfAllArticles <= $numberOfArticlesPerPage) {
//     $pages = null;
// } else {
//     if ($currentPage < $numberOfPages / 2) {
//         $pagesEndArray = ["...", $endPage];
//         $pagesFirstArray = range($currentPage, $currentPage + ($numberOfPaginationCells - 3));
//         $pages = array_merge($pagesFirstArray, $pagesEndArray);
//     } else if ($currentPage >= ($numberOfPages - $offset)) {
//         $pages = range($numberOfPages - $offset, $endPage);
//     } else {
//         $pagesFirstArray = range($currentPage, $currentPage + ($numberOfPaginationCells - 3));
//         $pagesEndArray = ["...", $endPage];
//         $pages = array_merge($pagesFirstArray, $pagesEndArray);
//     }
// }


// if (isset($currentPage) && ($currentPage >= 2) && ($currentPage <= end($pages))) {
//     $offset = (int) ($currentPage * $numberOfArticlesPerPage - $numberOfArticlesPerPage);
//     $sql = "SELECT * FROM article ORDER BY createdAt DESC LIMIT :numberOfArticlesPerPage OFFSET :offset";
//     $stmt = $pdo->prepare($sql);
//     $stmt->bindValue(':numberOfArticlesPerPage', $numberOfArticlesPerPage, PDO::PARAM_INT);
//     $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
//     $stmt->execute();
//     $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// } else {
//     $sql = "SELECT * FROM article ORDER BY createdAt DESC LIMIT :numberOfArticlesPerPage;";
//     $stmt = $pdo->prepare($sql);
//     $stmt->bindValue(':numberOfArticlesPerPage', $numberOfArticlesPerPage, PDO::PARAM_INT);
//     $stmt->execute();
//     $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
// }

