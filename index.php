<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start([
    'cookie_lifetime' => 86400,
]);


require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once 'config/config.php';
require_once 'database/connection.php';
require_once 'functions/helpers.php';
require_once 'functions/pagination.php';
require_once 'routers/routers.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$userID = getUserID();
$user = null;
$categories = getAllCategories($pdo);
$pages = getAllPages($currentPage, $numberOfArticlesPerPage, $numberOfPaginationCells, $pdo, $numberOfAllArticles);
$posts = getArticles($currentPage, $pages, $numberOfArticlesPerPage, $pdo);

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';


// $subject = 'Hello';
// $text = "World";
// $altbody = "Darova";
// $adress = 'kirill.savickiy@yahoo.com';




// // var_dump($posts);
// // exit;


if ($userID != null) {
    $sql_2 = "SELECT * FROM user WHERE id = '" . $userID . "'";
    $stmt_2 = $pdo->query($sql_2);
    $user = $stmt_2->fetch(PDO::FETCH_ASSOC);
}

//Public Routes
if ((isset($_REQUEST['act'])) && array_key_exists($_REQUEST['act'], $routers)) {
    require_once($routers[$_REQUEST['act']]);
    die();
}

// Admin Routes
if (isset($_SESSION['role']) && (isset($_REQUEST['act'])) && $_SESSION['role'] == 'admin' && array_key_exists($_REQUEST['act'], $adminrouters)) {
    require_once($adminrouters[$_REQUEST['act']]);
    die();
}

// for ($i = 1; $i <= 5000; $i++) {
//      fillingArticles($pdo);
// }
//  exit;

require_once 'templates/main.php';
