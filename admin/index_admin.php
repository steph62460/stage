<?php

$pdo = require '../isLoggedIn.php';
$user = isLoggeIn();

        $date = time();
        setlocale(LC_TIME, 'french.UTF-8');


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index_admin.css">
    <link rel="stylesheet" media="(max-width: 900px)" href="css/responsive/index_admin.css">
    <title>FC BUSNES - Accueil Admin</title>
</head>
<body>
    <header>
        <h1>FC Busnes Page d'accueil Admin</h1>
    </header>
    <div class="connexion">
           <p>Bienvenue <?= $user["prenom"] . ' ' . $user["nom"] ?></p>
           <div class="date">
           <p>Nous sommes le <?= ucwords(strftime('%A %d %B %Y' , $date)) ?></p>
           <p class="heure"> </p>
        </div>
           <a class="logout" href="../logout.php">Se déconnecter</a>
    </div>
    <div class="accueil">
        <button id="actu"><a href="admin-actu.php">Admin Actu</a></button>
        <button id="boutique"><a href="admin-boutique.php">Admin Boutique</a></button>
        <button id="equipes"><a href="admin-equipes.php">Admin Equipes</a></button>
    </div>
</body>
<script>
    const heure = document.querySelector(".heure");

setInterval(() => {
    heure.innerText = ". Il est " + new Date().toLocaleTimeString();
}, 0)
</script>
</html>
