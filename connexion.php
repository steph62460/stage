<?php

$pdo = require_once './db.php';
$pdo2 = require './isLoggedIn.php';
$user = isLoggedIn();

$passAdmin = require_once './data/secret.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_input = filter_input_array(INPUT_POST, [
        'email' => FILTER_SANITIZE_EMAIL
    ]);

    $email = $_input['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!$password || !$email) {
        $error = "LES CHAMPS DOIVENT ETRE REMPLIS";
    } else {
        $error = 'Mot de passe et/ou email invalide';

        $statementUser = $pdo->prepare('SELECT * FROM users WHERE email = :email');
        $statementUser->bindValue(':email', $email);
        $statementUser->execute();
        $users = $statementUser->fetch();
        if ($users && password_verify($password, $users['password'])) {
            if (password_verify($passAdmin, $users['password'])) {
                $statementSession = $pdo->prepare('INSERT INTO session VALUES(default, :id)');
                $statementSession->bindValue(':id', $users['idusers']);
                $statementSession->execute();
                $sessionId = $pdo->lastInsertId();
                setcookie('session', $sessionId, time() + 60 * 60, '', '', false, true);
                header('Location: ./admin/index_admin.php');
            } else {
                $statementSession = $pdo->prepare('INSERT INTO session VALUES(default, :id)');
                $statementSession->bindValue(':id', $users['idusers']);
                $statementSession->execute();
                $sessionId = $pdo->lastInsertId();
                setcookie('session', $sessionId, time() + 60 * 60, '', '', false, true);
                header('Location: /index.php');
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    require_once './php/includes/head.php'
    ?>
    <link rel="stylesheet" href="./css/connexion.css">
    <title>FC Busnes - Site officiel - Connexion</title>
</head>

<body>
    <?php
    require_once './php/includes/header.php'
    ?>
    <div class="test">
        <div class="formulaire">
            <form action="/connexion.php" method="POST">
                <div class="cadre">
                    <div>
                        <h2>SE CONNECTER</h2>
                        <div class="input">
                        <p class="text">Email</p>
                        <input class="input2" type="text" name="email" placeholder="email">
                        <p class="text">Mot de passe</p>
                        <input class="input2" type="password" name="password" placeholder="password">
                    </div>
                    </div>
                    <a href="#" class="oubliemdp">Mot de passe oublié?</a>
                    <?php if ($error) : ?>
                        <h1><?= $error ?></h1>
                    <?php endif; ?>
                    <div class="checkbox">
                        <input type="checkbox">
                        <p class="connecte">Restez connectez</p>
                    </div>
                    <a class="inscrip" href="inscription.php">Pas encore inscrit ? Inscrivez-vous ici</a>

                    <button type="submit">Connexion</button>
                </div>
            </form>
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