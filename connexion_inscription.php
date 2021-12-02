<?php

        // Declaration de constante pour les erreurs

        const ERROR_REQUIRES = 'Veuillez renseigner ce champ';
        const ERROR_EMAIL = 'L\'email n\'est pas valide';
        const ERROR_MDP = 'Le mot de passe n\'est pas valide';
        const ERROR_REPEAT = 'Les mots de passe ne sont pas identiques';

        // Déclaration tableau erreurs

        $errors = [
            'email' => '',
            'repeatPassword' => '',
            'password' => '' 
        ];

        // print_r($_SERVER);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          // Filter sanitize sur les input

        $_POST = filter_input_array(INPUT_POST, [
            'password' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'repeatPassword' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'email' => FILTER_SANITIZE_EMAIL,
        ]);  
        
        // Déclaration variables

        $password = $_POST['password'] ?? '';
        $repeatPassword = $_POST['repeatPassword'] ?? '';
        $email = $_POST['email'] ?? '';

        //Gestion erreurs

        if(!$password) {
            $errors['password'] = ERROR_REQUIRES;
        } else if(!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[+!@#$%])[0-9A-Za-z!@#$%]{8,20}$/', $password) ) {
            $errors['password'] = ERROR_MDP;
        }

        if (!$email) {
            $errors['email'] = ERROR_REQUIRES;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = ERROR_EMAIL;
        } 

        if (!$repeatPassword !== !$password) {
            $errors['repeatPassword'] = ERROR_REPEAT;
        } else if(!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[+!@#$%])[0-9A-Za-z!@#$%]{8,20}$/', $password) ) {
                $errors['password'] = ERROR_MDP;
            }
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  
    <?php
    require_once 'head.php'
    ?>
    <title>Connexion - Inscription</title>
</head>
<header>
    <nav class="navbar">
        <a href="index.html" class="nav-logo"><img src="img/logo club busnes.png">FC Busnes</a>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="actu.html" class="nav-link">Actualité</a>
            </li>
            <li class="nav-item">
                <a href="equipes.html" class="nav-link">Equipes</a>
            </li>
            <li class="nav-item">
                <a href="calendrier.html" class="nav-link">Calendrier et Classements</a>
            </li>
            <li class="nav-item">
                <a href="boutique.html" class="nav-link">Boutique</a>
            </li>
            <li class="nav-item">
                <a href="contact.html" class="nav-link">Contact</a>
            </li>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
</header>
<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="inscription()" >Connexion</button>
                <button type="button" class="toggle-btn" onclick="connexion()">Inscription</button>
            </div>
            <form id="connexion" action="./connexion_inscription.php" method="POST" class="input-group">
                <input type="text" class="input-field" name="email" placeholder="Email" id="email"  value= <?= isset($email) ? "$email" : ""?> >
                <?= $errors['email'] ? "<p>" . $errors['email'] . "<p>" : '' ?>
                <input type="text" class="input-field" name="password" placeholder="Mot de passe" id="password" title="Le mot de passe doit être compris entre 8 et 20 caractères et doit contenir au minimum:
                1 minuscule,
                1 majuscule,
                1 chiffre,
                1 caractère spécial (+!@#$%) "  value= <?= isset($password) ? "$password" : ""?> >
                <?= $errors['password'] ? "<p>" . $errors['password'] . "<p>" : '' ?>
                <input type="checkbox" class="check-box"><span>Rester connecté</span>
                <a href="redirection.php">
                <button type="submit" class="submit-btn" id="connexionC">Connexion</button></a>
            </form>
            <form id="inscription" action="./connexion_inscription.php" method="POST" class="input-group">
                <input type="text" class="input-field" placeholder="Nom" required>
                <input type="text" class="input-field" placeholder="Prenom"  required>
                <input type="email" name="email" class="input-field" placeholder="Email" required value= <?= isset($email) ? "$email" : ""?> >
                <?= $errors['email'] ? "<p>" . $errors['email'] . "<p>" : '' ?>
                <input type="text" class="input-field" name="password" placeholder="Mot de passe" required title="Le mot de passe doit être compris entre 8 et 20 caractères et doit contenir au minimum:
                1 minuscule,
                1 majuscule,
                1 chiffre,
                1 caractère spécial (+!@#$%) ">
                <?= $errors['password'] ? "<p>" . $errors['password'] . "<p>" : '' ?>
                <input type="text" class="input-field"  name="repeatPassword" placeholder="Répétez votre mot de passe" title="Le mot de passe doit être compris entre 8 et 20 caractères et doit contenir au minimum:
                1 minuscule,
                1 majuscule,
                1 chiffre,
                1 caractère spécial (+!@#$%) ">
                <?= $errors['repeatPassword'] ? "<p>" . $errors['repeatPassword'] . "<p>" : '' ?>
                <button type="submit" class="submit-btn inscr" id="passwordC">Inscription</button>
            </form>
        </div>
    </div>
</body>
<footer>
    <div class="footer">
        <div class="f2">
            <img src="img/sponsor/BNE.png" alt="">
            <img src="img/sponsor/f9.png" alt="">
            <img src="img/sponsor/JLTP-Nord.png">
            <img src="img/sponsor/pains_et_gourmandises.png">
            <img src="img/sponsor/veynat.png" alt="">
        </div>
        <div class="ftxt">FC Busnes © 2021</div>
    </div>

</footer>
 <script src="js/connexion.js"></script> 
</html>