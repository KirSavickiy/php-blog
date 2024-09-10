<?php

if (!isset($mysqli)) {
    die('Error: $mysqli is not set.');
}
$error = '';
if (count($_POST) > 0) {

    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    $result = $mysqli->query("SELECT * FROM user WHERE email = '". $email ."'");
    
    $user = $result->fetch_assoc();
    if ($user && password_verify($password, $user['password'])){
        $_SESSION['user_Id'] = $user['id'];
        header('Location: ?act=profile');
        die();
    } else{
        $error = 'User is not found';
    }
}


require_once('templates/login.php');