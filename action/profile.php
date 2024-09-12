<?php

chekUser();

$id = $_SESSION['user_Id'];
$stmt = $pdo->prepare("SELECT * FROM user WHERE id = :id");
$stmt->execute(['id' => $id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (count($_POST)){

    $name = $_POST['name'] ?? null;
    $surname = $_POST['surname'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $about = $_POST['about'] ?? null;
    $sql = "UPDATE user SET name = :name, surname = :surname, phone = :phone, about = :about WHERE id = :id ;";
    $pdo->prepare($sql)->execute([
        'name' => $name,
        'surname' => $surname,
        'phone' => $phone,
        'about' => $about,
        'id' => $id
    ]);
    header('Location: ?act=profile');
    exit();
    
}

require_once('templates/profile.php');