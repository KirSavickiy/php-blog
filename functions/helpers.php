<?php

function transliterate($st, $rotate = false): string
{
    $letters = array(
        'а' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'e',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'y',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'h',
        'ц' => 'c',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'sch',
        'ь' => '',
        'ы' => 'y',
        'ъ' => '\'',
        'э' => 'e',
        'ю' => 'yu',
        'я' => 'ya',

        'А' => 'A',
        'Б' => 'B',
        'В' => 'V',
        'Г' => 'G',
        'Д' => 'D',
        'Е' => 'E',
        'Ё' => 'E',
        'Ж' => 'Zh',
        'З' => 'Z',
        'И' => 'I',
        'Й' => 'Y',
        'К' => 'K',
        'Л' => 'L',
        'М' => 'M',
        'Н' => 'N',
        'О' => 'O',
        'П' => 'P',
        'Р' => 'R',
        'С' => 'S',
        'Т' => 'T',
        'У' => 'U',
        'Ф' => 'F',
        'Х' => 'H',
        'Ц' => 'C',
        'Ч' => 'Ch',
        'Ш' => 'Sh',
        'Щ' => 'Sch',
        'Ь' => '\'',
        'Ы' => 'Y',
        'Ъ' => '\'',
        'Э' => 'E',
        'Ю' => 'Yu',
        ' ' => '-',
        'Я' => 'Ya',
    );
    $letters = $rotate ? array_flip($letters) : $letters;
    $st = strtr($st, $letters);
    return $st;
}

function chekUser()
{
    if (empty($_SESSION['user_Id'])) {
        header('Location: ?act=login');
        die();
    }
}

function chekAdmin()
{
    if ($_SESSION['role'] != 'admin') {
        header('Location: ?act=login');
        die();
    }
}


function getUserID(): int
{
    return $_SESSION['user_Id'];
}

function uploadImage(): array
{

    $error = "";
    $typeImage = ['image/png', 'image/jpg', 'image/jpeg'];
    $originalFileName = $_FILES['image']['name'];
    // Получение расширения файла
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $name = null;
    // Генерация уникального имени для файла с сохранением расширения

    if ($_FILES['image']['error'] != 0) {
        $error = "Error is" . " . FILES['image']['error'] . ";
    }

    if (($_FILES['image']['name'] == "")) {
        $error = "";
        return [
            "status" => "",
            "path" => $name
        ];
    }

    if ($_FILES['image']['size'] > 2000000) {
        $error = "Превышен максимальный вес изображения: 2 МБ";
    }

    if (!in_array($_FILES['image']['type'], $typeImage) && $_FILES['image']['name'] != "") {
        $error = "Используйте файлы форматов img и png !";
    }

    if (empty($error)) {
        $name = "images/" . md5(uniqid()) . '.' . $fileExtension;
        move_uploaded_file($_FILES['image']['tmp_name'], $name);
        return [
            "status" => "",
            "path" => $name
        ];
    } else {
        return [
            "status" => $error,
            "path" => $name
        ];
    }
}

function deleteFile($filePath): bool
{
    // Проверяем, существует ли файл перед удалением
    if (file_exists($filePath)) {
        // Удаляем файл
        if (unlink($filePath)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getAllCategories($pdo): array
{
    $sql = "SELECT  id, title FROM category";
    $stmt = $pdo->query($sql);
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($categories as &$category) {
        $category['translit'] = [];
        $category['translit'] = transliterate($category['title'], 0);
    }
    return $categories;
}

function getAllArticles($pdo): int {
    $sql = "SELECT COUNT(*) FROM article;";
    $stmt = $pdo->query($sql);
    $articles = array_values($stmt->fetch(PDO::FETCH_ASSOC));
    return (int)$articles[0];
}

function getCategoryArticles($pdo, $categoryId): int{
    $sql = "SELECT COUNT(*) FROM article WHERE category_id = ?;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$categoryId]);
    $articles = array_values($stmt->fetch(PDO::FETCH_ASSOC));
    return (int)$articles[0];
}

function getArticleAuthor($pdo, $userID): string
{
    $sql = "SELECT name, surname FROM user WHERE id = ? ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userID]);
    $author = $stmt->fetch(PDO::FETCH_ASSOC);
    return $author ? $author['name'] . ' ' . $author['surname'] : 'Unknown Author';
}

function getArticles($currentPage, $pages, $numberOfArticlesPerPage, $pdo): array
{
    if (isset($currentPage) && ($currentPage >= 2) && ($currentPage <= end($pages))) {
        $offset = (int) ($currentPage * $numberOfArticlesPerPage - $numberOfArticlesPerPage);
        $sql = "SELECT * FROM article ORDER BY createdAt DESC LIMIT :numberOfArticlesPerPage OFFSET :offset";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':numberOfArticlesPerPage', $numberOfArticlesPerPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $sql = "SELECT * FROM article ORDER BY createdAt DESC LIMIT :numberOfArticlesPerPage;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':numberOfArticlesPerPage', $numberOfArticlesPerPage, PDO::PARAM_INT);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    foreach ($posts as &$post) {
        $post['author'] = [];
        $post['author'] = getArticleAuthor($pdo, $post['userId']);
    }
    return $posts ?? null;
}

function getArticlesCategory($articles, $categoryId): array
{
    $filteredArticles = array_filter($articles, function ($article) use ($categoryId) {
        return $article['category_id'] === $categoryId;
    });

    return $filteredArticles;
}

function getAllPages($currentPage, $numberOfArticlesPerPage, $numberOfPaginationCells, $pdo, $numberOfAllArticles): array
{
    $offset = $numberOfPaginationCells - 1;
    $numberOfPages = (int) (ceil($numberOfAllArticles / $numberOfArticlesPerPage));
    $endPage = $numberOfPages;


    if ($currentPage <= 0 || $currentPage > $endPage) {
        $currentPage = 1;
    }

    if ($numberOfAllArticles <= $numberOfPaginationCells * $numberOfArticlesPerPage && $numberOfAllArticles > $numberOfArticlesPerPage) {
        $numberOfPaginationCells = (int) ceil($numberOfAllArticles / $numberOfArticlesPerPage);
        $pages = range(1, $numberOfPaginationCells);
    } else if ($numberOfAllArticles <= $numberOfArticlesPerPage) {
        $pages = [];
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
    return $pages;
}
