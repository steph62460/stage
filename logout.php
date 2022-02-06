<?php

$pdo = require_once './db.php';

$sessionId = $_COOKIE['session'] ?? '';

if($sessionId) {
    $statement = $pdo->prepare('DELETE FROM session WHERE id=:id');
    $statement->bindValue(':id', $sessionId);
    $statement->execute();
    setcookie('session', '', time() - 1);
    header('Location: /index.php');
} else {
    header('Location: /index.php');
}