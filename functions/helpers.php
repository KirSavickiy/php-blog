<?php

require_once 'config.php';

function chekUser()
{
    if (empty($_SESSION['user_Id'])) {
        header('Location: ?act=login');
        die();
    }
}

function getUserID(): int
{
    return $_SESSION['user_Id'];
}

function uploadImage(): array
{

    $error = "";
    $typeImage = ['image/png', 'image/jpg'];
    $originalFileName = $_FILES['image']['name'];
    // Получение расширения файла
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    // Генерация уникального имени для файла с сохранением расширения

    if ($_FILES['image']['error'] != 0) {
        $error = "Error is" .  " . FILES['image']['error'] . ";
    }

    if (!in_array($_FILES['image']['type'], $typeImage)) {
        $error = "This file is not Image";
    }

    $name = "images/" . md5(uniqid()) . '.' . $fileExtension;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $name)) {
        return [
            "status" => 'OK',
            "path" => $name
        ];
    } else {
        return [
            "status" => $error,
            "path" => $name
        ];
    }
}

function deleteFile($filePath):bool
{
    // Проверяем, существует ли файл перед удалением
    if (file_exists($filePath)) {
        // Удаляем файл
        if (unlink($filePath)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
}
}