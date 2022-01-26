<?php

$pdo = require "../../db.php";

$id = $_GET['delete'] ?? '';

$stateDelete = $pdo->prepare('DELETE FROM boutique WHERE id=:id');
$stateDelete->bindValue(':id', $id);
$stateDelete->execute();

header('Location: ../admin-boutique.php');