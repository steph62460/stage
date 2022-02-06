 <?php

$pdo = require './isLoggedIn.php';
$user = isLoggedIn();

$pdo2 = require './db.php';
$stateBoutique = $pdo2->prepare('SELECT * FROM boutique');
$stateBoutique->execute();
$boutique=$stateBoutique->fetchAll();


?> 
<!DOCTYPE html>
<html lang="fr">
<head>
   <?php  require_once "./php/includes/head.php" ?>
    <link rel="stylesheet" href="css/boutique.css">
    <title>FC Busnes - Site officiel - Boutique</title>
</head>

<body>
    <?php require_once "./php/includes/header_boutique.php" ?>
    <div class="test">
    <h2>Boutique officielle du Football Club de Busnes</h2>
        <div class="boutique">
            <?php foreach ($boutique as $a) : ?>
            <div class="article">
                <a href="article_boutique.php?id=<?= $a['id'] ?>&cat=boutique"><img src="<?= $a['img'] ?>" alt=""></a>
                <h3><?= $a['denomination'] ?></h3>
                <p><?= $a['adulte'] ?></p>
                <p><?= $a['enfant'] ?></p>  
            </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php require_once "./php/includes/footer.php" ?>
</body>
<script>
    const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");

    hamburger.addEventListener("click", mobileMenu);

    function mobileMenu() {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
    }

</script>
</html>