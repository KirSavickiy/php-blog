<?php

chekUser();

$userID = $_SESSION['user_Id'];
$result = $mysqli->query("SELECT * FROM article WHERE userId = '". $userID ."'");
$articles = $result->fetch_all(MYSQLI_ASSOC);


require_once('templates/articles.php');