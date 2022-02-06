<?php 

$pdo = require './db.php';
$pdo2 = require './isLoggedIn.php';
$user = isLoggedIn();
$id=$_GET["id"];
$stateActu = $pdo->prepare('SELECT * FROM articles_actu WHERE id=:id');
$stateActu->bindValue(":id", $id);
$stateActu->execute();
$actu=$stateActu->fetch();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once "./php/includes/head.php" ?>
    <link rel="stylesheet" href="css/page_actu.css">
    <title>FC Busnes - Site officiel - Page Actu</title>
</head>
<body>
    <?php require_once "./php/includes/header.php" ?>
    <div class="articles">
            <div>
                <h2><?= $actu['title'] ?></h2>
                <div class="article">
                    <img src="<?= $actu['img'] ?>" class="photo" alt="">
                    <p><?= $actu['texte1'] ?></p>
                    <p><?= $actu['score1'] ?></p>
                    <p><?= $actu['buteur1'] ?></p>
                    <?php if($actu['texte2'] && $actu['score2'] && $actu['buteur2']) : ?>
                    <p><?= $actu['texte2'] ?></p>
                    <p><?= $actu['score2'] ?></p>
                    <p><?= $actu['buteur2'] ?></p>
                    <p><?= $actu['prochainAffiche'] ?></p>
                    <?php else : ?>
                    <p><?= $actu['prochainAffiche'] ?></p>   
                    <?php endif; ?>
                </div>
                <button><a href="actu.php" class="return">Retour à la page actu</a></button>
            
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