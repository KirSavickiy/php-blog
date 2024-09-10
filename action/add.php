<?php

chekUser();

$userID = $_SESSION['user_Id'];

// $result = $mysqli->query("SELECT * FROM user WHERE id = '". $userID ."'");
// $user = $result->fetch_assoc();

if (count($_POST)) {


    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;
    $status = uploadImage();
    $path = $status["path"] ?? null;
    $mysqli->query("INSERT INTO article SET userId = '$userID', title = '$title', content = '$content', img = '$path', createdAt = NOW();");


    header('Location: ?act=articles');
    die();

}


require_once('templates/add.php');
