<?php

        // Declaration de constante pour les erreurs

        const ERROR_REQUIRES = 'Veuillez renseigner ce champ';
        const ERROR_EMAIL = 'L\'email n\'est pas valide';
        const ERROR_MDP = 'Le mot de passe n\'est pas valide';

        // Déclaration tableau erreurs

        $errors = [
            'email' => '',
            'password' => '' 
        ];

        // print_r($_SERVER);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          // Filter sanitize sur les input

        $_POST = filter_input_array(INPUT_POST, [
            'password' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'email' => FILTER_SANITIZE_EMAIL,
        ]);  
        
        // Déclaration variables

        $password = $_POST['password'] ?? '';
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
    }
    
    

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    require_once './php/includes/head.php'
    ?>
    <title>FC Busnes - Site officiel - Connexion/Inscription</title>
</head>
<body>
<?php
    require_once './php/includes/header.php'
    ?>
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
                <button type="submit" name="connexion" class="submit-btn" id="connexionC">Connexion</button>
            </form>
            <?php
            require_once 'inscription.php'
            ?>
        </div>
    </div>
    <?php  require_once "./php/includes/footer.php" ?>
</body>
 <script src="js/connexion.js"></script> 
</html>