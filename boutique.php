 <?php

require_once './isLoggedIn.php';
$user = isLoggedIn();

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
    <div class="connexion">
        <?php if($user) : ?>
            <p>Bienvenue <?= $user['prenom'] . " " . $user['nom']?></p>
            <?php else :?>
              <a href="connexion.php">Connexion/Inscription</a>  
            <?php endif ;?>
    </div>
    <h2>Boutique officielle du Football Club de Busnes</h2>
        <div class="boutique"></div>
<?php require_once "./php/includes/footer.php" ?>
</body>
</html>
<script src="js/boutique.js" type="module"></script>