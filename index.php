<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once 'functions/helpers.php';
require_once 'config.php';

$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

$userID = $_SESSION['user_Id'] ?? null;
try{
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
} catch (PDOException $exeption){
    echo $exeption->getMessage();
}

$sql_1 = "SELECT * FROM article;";
$stmt_1 = $pdo->query($sql_1);
$posts = $stmt_1->fetchAll(PDO::FETCH_ASSOC);
if ($userID != null){
    $sql_2 = "SELECT * FROM user WHERE id = '". $userID ."'";
    $stmt_2 = $pdo->query($sql_2);
    $user = $stmt_2->fetchAll(PDO::FETCH_ASSOC);
}


if (isset($_REQUEST['act'])) {
    switch ($_GET['act']) {

        case 'register':
            require_once('action/register.php');
            break;
        case 'login':
            require_once('action/login.php');
            break;
        case 'profile':
            require_once('action/profile.php');
            break;
        case 'add':
            require_once('action/add.php');
            break;
        case 'articles':
            require_once('action/articles.php');
            break;
        case 'edit':
            require_once('action/edit.php');
            break;
        case 'delete':
            require_once('action/delete.php');
            break;
        case 'view':
            require_once('action/view.php');
            break;
        case 'logout':
            require_once('action/logout.php');
            break;
    }
    die();
}

require_once 'templates/main.php';
