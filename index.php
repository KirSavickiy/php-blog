<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once 'functions/helpers.php';
require_once 'config/config.php';
require_once 'routers/routers.php';
require_once 'scripts/database.php';

$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

$userID = $_SESSION['user_Id'] ?? null;
$user = null;

try {
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
} catch (PDOException $exeption) {
    echo $exeption->getMessage();
}


$sql_1 = "SELECT * FROM article;";
$stmt_1 = $pdo->query($sql_1);
$posts = $stmt_1->fetchAll(PDO::FETCH_ASSOC);
if ($userID != null) {
    $sql_2 = "SELECT * FROM user WHERE id = '" . $userID . "'";
    $stmt_2 = $pdo->query($sql_2);
    $user = $stmt_2->fetch(PDO::FETCH_ASSOC);

}


if (isset($_REQUEST['act'])) {
    if (array_key_exists($_REQUEST['act'], $routers)){
        require_once($routers[$_REQUEST['act']]);
        die();
    }
    if(isset($_SESSION['role'])){
        if ((array_key_exists($_REQUEST['act'], $adminrouters)) && ($_SESSION['role'] == 'admin')) {
            require_once($adminrouters[$_REQUEST['act']]);
            die();
        }
    }
       
   
}

// for ($i = 1; $i <= 50; $i++) {
//      fillingArticles($pdo);
// }
//  exit;

require_once 'templates/main.php';
