<?php
function isLoggedIn()
{
    $sessionId = $_COOKIE['session'] ?? '';
    $pdo = require './db.php';

    if ($sessionId) {
        $statementSession = $pdo->prepare('SELECT * FROM session WHERE id=:id');
        $statementSession->bindValue(':id', $sessionId);
        $statementSession->execute();
        $session = $statementSession->fetch();

        $userStatement = $pdo->prepare('SELECT * FROM users WHERE idusers=:id');
        $userStatement->bindValue(':id', $session['idusers']);
        $userStatement->execute();
        $user = $userStatement->fetch();

    }

    return $user ?? '';
}