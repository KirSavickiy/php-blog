<?php
$numberOfAllArticles = 10;
$numberOfArticlesPerPage = 10;
$numberOfPaginationCells = 5;
$offset = $numberOfPaginationCells - 1;

$numberOfPages = (int) (ceil($numberOfAllArticles / $numberOfArticlesPerPage));
$endPage = $numberOfPages;
$currentPage = 0;
if ($currentPage <= 0 || $currentPage > $endPage) {
    $currentPage = 1;
}

if ($numberOfAllArticles <= $numberOfPaginationCells * $numberOfArticlesPerPage && $numberOfAllArticles > $numberOfArticlesPerPage) {
    $numberOfPaginationCells = (int) ceil($numberOfAllArticles / $numberOfArticlesPerPage);
    $pages = range(1, $numberOfPaginationCells);
} else if ($numberOfAllArticles <= $numberOfArticlesPerPage) {
    $pages = null;
} else {
    if ($currentPage < $numberOfPages / 2) {
        $pagesEndArray = ["...", $endPage];
        $pagesFirstArray = range($currentPage, $currentPage + ($numberOfPaginationCells - 3));
        $pages = array_merge($pagesFirstArray, $pagesEndArray);
    } else if ($currentPage >= ($numberOfPages - $offset)) {
        $pages = range($numberOfPages - $offset, $endPage);
    } else {
        $pagesFirstArray = range($currentPage, $currentPage + ($numberOfPaginationCells - 3));
        $pagesEndArray = ["...", $endPage];
        $pages = array_merge($pagesFirstArray, $pagesEndArray);
    }
}


var_dump($pages);
