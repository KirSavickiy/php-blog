<?php

$id = $_GET['id'] ?? null;
$post = $mysqli->query("SELECT * FROM article WHERE id = " . $id. ";")->fetch_assoc();
require_once('templates/view.php');
