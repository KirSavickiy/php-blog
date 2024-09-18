<?php

if (!isset($pdo)) {
    die('Error: $pdo is not set.');
}

if (count($_POST) > 0) {

    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $confirm_password = $_POST['confirm_password'] ?? null;
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO user(email, password) VALUES (:email,:passwordhash);");
    $stmt->execute([
        'email' => $email,
        'passwordhash' => $password_hash
    ]);

    header('Location: ?act=login');
    die();
}

require_once('templates/register.php');