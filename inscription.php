<?php

$pdo = require_once './db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_input = filter_input_array(INPUT_POST, [
        'email' => FILTER_SANITIZE_EMAIL,
        'nom' => FILTER_SANITIZE_SPECIAL_CHARS,
        'prenom' => FILTER_SANITIZE_SPECIAL_CHARS
    ]);

    $email = $_input['email'] ?? '';
    $nom = $_input['nom'] ?? '';
    $prenom = $_input['prenom'] ?? '';
    
    $password = $_POST['password'] ?? '';

    if (!$email || !$nom || !$prenom || !$password) {
        $error = "Les champs doivent être remplis";
    } else {
        
        $hashPassword = password_hash($password, PASSWORD_ARGON2I);
        $statement = $pdo->prepare ('INSERT INTO users VALUES (
            DEFAULT,
            :nom,
            :prenom,
            :email,
            :password
            )
            ');
            $statement->bindValue(':nom', ucfirst($nom));
            $statement->bindValue(':prenom', ucfirst($prenom));
            $statement->bindValue(':email', $email);
            $statement->bindValue(':password', $hashPassword);
            $statement->execute();

            header('Location: /connexion.php');
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
    <title>FC Busnes - Site officiel - Inscription</title>
</head>
<body>
<?php
    require_once './php/includes/header.php'
    ?>
<center>
    <div class="formulaire">
        
        <form action="/inscription.php" method="POST">
            <div class="cadre">
                <div>
            <h2>INSCRIPTION</h2>
            <p>Nom</p>
            <input type="text" name="nom" placeholder="Nom">
            <p>Prenom</p>
            <input type="text" name="prenom" placeholder="Prenom">
            <p>Email</p>
            <input type="email" name="email" placeholder="Email">
            <p>Mot de passe</p>
            <input type="password" name="password" placeholder="Password">
            <?php if($error) : ?>
                <h1><?= $error ?></h1>
            <?php endif ;?>
        </div>
            <button type="submit">S'inscrire</button>
        </div>
        </form>
    </div>
</center>

<?php  require_once "./php/includes/footer.php" ?>
</body>
 <!-- <script src="js/connexion.js"></script>  -->
</html>