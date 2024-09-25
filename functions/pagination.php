<?php

$currentPage = $_GET['page'] ?? 1;
$numberOfArticlesPerPage = 10;
$numberOfPaginationCells = 5;
$numberOfAllArticles = getAllArticlesInt($pdo);
