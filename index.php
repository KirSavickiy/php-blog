<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once 'functions/helpers.php';
require_once 'config.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$posts = $mysqli->query("SELECT * FROM article;")->fetch_all(MYSQLI_ASSOC);

if (isset($_GET['act'])) {
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
    }
    die();
}
require_once 'templates/main.php';
