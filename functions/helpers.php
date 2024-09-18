<?php


function chekUser()
{
    if (empty($_SESSION['user_Id'])) {
        header('Location: ?act=login');
        die();
    }
}

function chekAdmin()
{
    if ($_SESSION['role'] != 'admin') {
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
    $typeImage = ['image/png', 'image/jpg', 'image/jpeg'];
    $originalFileName = $_FILES['image']['name'];
    // Получение расширения файла
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $name = null;
    // Генерация уникального имени для файла с сохранением расширения

    if ($_FILES['image']['error'] != 0) {
        $error = "Error is" .  " . FILES['image']['error'] . ";
    }

    if (($_FILES['image']['name'] == "")) {
        $error = "";
        return [
            "status" => "",
            "path" => $name
        ];
    }

    if ($_FILES['image']['size'] > 2000000){
        $error = "Превышен максимальный вес изображения: 2 МБ";
    }

    if (!in_array($_FILES['image']['type'], $typeImage) && $_FILES['image']['name'] != "") {
        $error = "Используйте файлы форматов img и png !";
    }

    if (empty($error))  {
        $name = "images/" . md5(uniqid()) . '.' . $fileExtension;
        move_uploaded_file($_FILES['image']['tmp_name'], $name);
        return [
            "status" => "",
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