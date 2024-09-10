<?php

chekUser();

$userID = $_SESSION['user_Id'];
$id = $_GET['id'] ?? null;
$post = $mysqli->query("SELECT * FROM article WHERE id = " . $id. " AND userId = " . $userID." ;")->fetch_assoc();

// $result = $mysqli->query("SELECT * FROM user WHERE id = '". $userID ."'");
// $user = $result->fetch_assoc();

if (count($_POST)){
    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;
    $path = $mysqli->query("SELECT img FROM article WHERE id = ". $id ."; ")->fetch_assoc();
    $filePath = $path['img'];
    if ($filePath != null){
        deleteFile($filePath);
    }
    $mysqli->query("UPDATE article SET img = NULL WHERE id = ". $id .";");
    $status = uploadImage();
    $mysqli->query("UPDATE article SET title = '$title', content = '$content', img = '" . $status["path"]."' WHERE id = " . $id . " AND userId =  " . $userID . ";");
    
    var_dump($_FILES);
    exit;

    header('Location: ?act=articles');
    die();
    
}

require_once('templates/edit.php');