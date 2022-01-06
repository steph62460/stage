<?php

$dns = "mysql:host=localhost;dbname=fcbusnes";
$users = 'root';
$password = 'Louise150717+';

try {
    $pdo = new PDO($dns, $users, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    echo "error : " . $e->getMessage();
}

return $pdo;