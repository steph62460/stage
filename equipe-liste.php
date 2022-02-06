<?php

$pdo = require_once './db.php';
$pdo2 = require './isLoggedIn.php';
$user = isLoggedIn();

$id = $_GET['id'] ?? '';

$stateOneTeam = $pdo->prepare('SELECT nom, prenom, date_naissance, name, img
FROM joueurs join equipes 
ON joueurs.idequipes = equipes.id where idequipes =:id');
$stateOneTeam->bindValue(':id', $id);
$stateOneTeam->execute();
$details = $stateOneTeam->fetchAll();

// echo "<pre>";
// var_dump($details);
// echo "</pre>";


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require_once "./php/includes/head.php" ?>
    <link rel="stylesheet" href="css/equipe-liste.css">
    <title>FC Busnes - Site officiel - Equipes - Détail Equipes</title>
</head>

<body>
    <?php require_once "./php/includes/header.php" ?>
    <div class="section">
        <p class="title"><?= $details[0]['name'] ?></p>
        <div class="team">
            <img src="<?= $details[0]['img'] ?>" alt="">
        </div>
    </div>
    <h2>LISTE DES JOUEURS</h2>
    <div class="tableau">
        <table>
            <thead>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Date de naissance</th>
            </thead>
            <tbody>
                <?php foreach ($details as $detail) : ?>
                    <tr>
                        <td><?= $detail['nom'] ?></td>
                        <td><?= $detail['prenom'] ?></td>
                        <td><?= $detail['date_naissance'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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