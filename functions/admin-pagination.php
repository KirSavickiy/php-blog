<?php

$totalPages = count($pages);  
$currentPage = $_GET['page'] ?? 1;  
$startPage = max(1, $currentPage - 2);  
$endPage = min($totalPages, $currentPage + 2);  


if ($currentPage > 1) {
    echo '<a href="?act=admin&page=' . ($currentPage - 1) . '" class="page-link">‹ Предыдущая</a>';
}

// Отображаем диапазон страниц
if ($startPage > 1) {
    echo '<a href="?act=admin&page=1" class="page-link">1</a>';
    echo '<span class="page-link">...</span>';
}

for ($page = $startPage; $page <= $endPage; $page++) {
    if ($page == $currentPage) {
        echo '<span class="page-link active">' . $page . '</span>';
    } else {
        echo '<a href="?act=admin&page=' . $page . '" class="page-link">' . $page . '</a>';
    }
}

if ($endPage < $totalPages) {
    echo '<span class="page-link">...</span>';
    echo '<a href="?act=admin&page=' . $totalPages . '" class="page-link">' . $totalPages . '</a>';
}

// Отображаем кнопку следующей страницы
if ($currentPage < $totalPages) {
    echo '<a href="?act=admin&page=' . ($currentPage + 1) . '" class="page-link">Следующая ›</a>';
}
?>
