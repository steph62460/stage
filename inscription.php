<?php

$pdo = require_once './db.php';
$pdo2 = require './isLoggedIn.php';
$user = isLoggedIn();

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
    }else if (!preg_match('/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $password)) {
        $error = "Le mot de passe n'est pas conforme";  
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
    <div class="test">
    <div class="formulaire">
        
        <form action="/inscription.php" method="POST">
            <div class="cadre">
                <div class="inputInscription">
            <h2>INSCRIPTION</h2>
            <div class="input">
            <p class="text">Nom</p>
            <input class="input2" type="text" name="nom" placeholder="Nom">
            <p class="text">Prenom</p>
            <input class="input2" class="input2" type="text" name="prenom" placeholder="Prenom">
            <p class="text">Email</p>
            <input class="input2" type="email" name="email" placeholder="Email">
            <p class="text">Mot de passe</p>
            <input class="input2" type="password" name="password" placeholder="Password" title="mot de passe compris entre 8 et 20 caractères comprenant :
            1 chiffre,
            1 minuscule,
            1 majuscule,
            1 caractère spécial (!@#$%^&*-)">
            <?php if($error) : ?>
                <h1><?= $error ?></h1>
            <?php endif ;?>
        </div>
            </div>
            <button type="submit">S'inscrire</button>
        </div>
        </form>
    </div>
</div>

<?php  require_once "./php/includes/footer.php" ?>
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