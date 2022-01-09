<?php

$pdo = require_once './db.php';

$stateTeam = $pdo->prepare('SELECT * FROM equipes');
$stateTeam->execute();
$equipes = $stateTeam->fetchAll();

// echo "<pre>";
// var_dump($equipes);
// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require_once "./php/includes/head.php" ?>
    <link rel="stylesheet" href="css/equipes.css">
    <link rel="stylesheet" media="(max-width: 900px)" href="css/responsive/equipesmedia.css">
    <title>FC Busnes - Site officiel - Liste Equipes</title>
</head>

<body>
    <?php require_once "./php/includes/header.php" ?>
    <h2>Liste des équipes du club</h2>

    <div class="boutique">
        <?php foreach ($equipes as $equipe) : ?>
            <div class="article">
                <h3><?= $equipe['name'] ?></h3>
                <a href="equipe-liste.php?id=<?= $equipe['id'] ?>">
                    <img src="<?= $equipe['img'] ?>" alt="">
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <?php require_once "./php/includes/footer.php" ?>
</body>

</html>
<!-- <script src="js/equipes.js" type="module"></script> -->