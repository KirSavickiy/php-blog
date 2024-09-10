<?php

if (!isset($mysqli)) {
    die('Error: $mysqli is not set.');
}

if (count($_POST) > 0) {

    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $confirm_password = $_POST['confirm_password'] ?? null;
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $mysqli->query("INSERT INTO user(email, password) VALUES ('" . $email . "','" . $password_hash . "');");

    header('Location: ?act=login');
    die();
}

require_once('templates/register.php');