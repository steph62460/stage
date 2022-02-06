<?php


$pdo = require './db.php';

$pdo2 = require './isLoggedIn.php';
$user = isLoggedIn();

$page = $_GET['page'] ?? '';

if($page) {
    $currentPage = strip_tags($page);
} else {
    $currentPage = 1;
}

$stateCount = $pdo->prepare ('SELECT COUNT(*) as nbreArt FROM articles_actu');
$stateCount->execute();
$nbresArticles = $stateCount->fetch();
// echo $nbresArticles['nbreArt'];

$artPerPage = 6;
$pages = ceil($nbresArticles['nbreArt'] / $artPerPage);
// echo $pages;

$first = ($currentPage * $artPerPage) - $artPerPage;

$stateArtOnThisPage = $pdo->prepare('SELECT * FROM articles_actu ORDER BY id DESC LIMIT :first, :artPerPage ');
$stateArtOnThisPage->bindValue(':first', $first, PDO::PARAM_INT).
$stateArtOnThisPage->bindValue(':artPerPage', $artPerPage, PDO::PARAM_INT);
$stateArtOnThisPage->execute();
$articlesOnThisPage = $stateArtOnThisPage->fetchAll();

// $stateActu = $pdo->prepare('SELECT * FROM articles_actu  LIMIT 0, 6');
// $stateActu->execute();
// $actus=$stateActu->fetchAll();



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php  require_once "./php/includes/head.php" ?>
    <link rel="stylesheet" href="css/actu.css">
    <title>FC Busnes - Site officiel - Page Actualités</title>
</head>
<body>
    <?php  require_once "./php/includes/header.php" ?>
    <h1>ACTUALITES</h1>

    <div class="actu">
        <?php foreach ($articlesOnThisPage as $a) : ?>
        <div class="article">
            <h2><?= $a['title'] ?></h2>
            <div class="flex">
                <img  class="photo"src="<?= $a['img'] ?>" alt="">
                <p class='texte1'><?= $a['texte1'] ?></p>
            </div>
            <div class="divLien">
                <p>Publié le <?= $a['date'] ?></p>
                <a class="lien" href="page_actu.php?id=<?=$a['id']?>">Lire la suite</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="pagination">
        <?php for($page = 1; $page <= $pages; $page++) : ?>
            <li class="page-item <?=($currentPage == $page) ? "active" : "" ?> ">
                <a href="./actu.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
            </li>
            <?php endfor ; ?>
        </div>
    <?php  require_once "./php/includes/footer.php" ?>
</body>
<script src="js/actu.js" type="module"></script>
</html>