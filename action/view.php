<?php

chekUser();
$userID = $_SESSION['user_Id'];
$id = $_GET['id'] ?? null;
$post = $mysqli->query("SELECT * FROM article WHERE id = " . $id. " AND userId = " . $userID." ;")->fetch_assoc();

require_once('templates/view.php');
