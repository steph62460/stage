<?php

$pdo = require_once './db.php';

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
                header('Location: ./admin/index_admin.html');
            } else {
                $statementSession = $pdo->prepare('INSERT INTO session VALUES(default, :id)');
                $statementSession->bindValue(':id', $users['idusers']);
                $statementSession->execute();
                $sessionId = $pdo->lastInsertId();
                setcookie('session', $sessionId, time() + 60 * 3, '', '', false, true);
                header('Location: /boutique.php');
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

    <center>

        <div class="formulaire">
            <form action="/connexion.php" method="POST">
                <h2>SE CONNECTER</h2>
                <p class="text">Email</p>
                <input type="text" name="email" placeholder="email">
                <p class="text">Mot de passe</p>
                <input type="password" name="password" placeholder="password">
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

            </form>
        </div>
    </center>


    <?php require_once "./php/includes/footer.php" ?>
</body>
<!-- <script src="js/connexion.js"></script>  -->

</html>