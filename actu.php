<?php

$articleDb = require __DIR__ . './database/models/databaseActu.php';
$articles = $articleDb->fetchAllArticle();

$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php  require_once "./php/includes/head.php" ?>
    <link rel="stylesheet" href="css/actu.css">
    <link rel="stylesheet" media="(max-width: 900px)" href="css/responsive/actumedia.css">
    <title>FC Busnes - Site officiel - Page Actualités</title>
</head>
<body>
    <?php  require_once "./php/includes/header.php" ?>
    <h1>ACTUALITES</h1>

    <div class="actu">
        <div class="article">
            <?php foreach ($articles as $a) : ?>
            <h2><?= $a['title'] ?></h2>
            <div class="flex">
                <img  class="photo"src="<?= $a['img'] ?>" alt="">
                <p class='texte1'><?= $a['texte1'] ?></p>
            </div>
            <div class="divLien">
                <p>Publié le <?= $a['date'] ?></p>
                <a class="lien" href="page_actu.php?id=<?=$a['id']?>&cat=articles">Lire la suite</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php  require_once "./php/includes/footer.php" ?>
</body>
<script src="js/actu.js" type="module"></script>
</html>