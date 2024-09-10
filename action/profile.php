<?php

chekUser();

$userID = $_SESSION['user_Id'];
$result = $mysqli->query("SELECT * FROM user WHERE id = '". $userID ."'");
$user = $result->fetch_assoc();

if (count($_POST)){

    $name = $_POST['name'] ?? null;
    $surname = $_POST['surname'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $about = $_POST['about'] ?? null;
    
    $mysqli->query("UPDATE user SET name = '" . $name ."', surname = '" . $surname ."', phone = '" . $phone ."', about = '" . $about ."' WHERE id = $userID ;");
    header('Location: ?act=profile');
    exit();
    
}

require_once('templates/profile.php');