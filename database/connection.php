<?php

$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

try {
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
} catch (PDOException $exeption) {
    echo $exeption->getMessage();
}
