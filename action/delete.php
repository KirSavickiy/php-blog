<?php

chekUser();

$userID = $_SESSION['user_Id'];
$id = $_GET['id'] ?? null;

// $result = $mysqli->query("SELECT * FROM user WHERE id = '". $userID ."'");
// $user = $result->fetch_assoc();

if ($_GET['id']){
    $mysqli->query("DELETE FROM article WHERE id = " . $id . " AND userId =  " . $userID . ";");
    header('Location: ?act=articles');
    die();
}
