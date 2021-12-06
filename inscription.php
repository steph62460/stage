<?php

const ERROR_REQUIRES2 = 'Veuillez renseigner ce champ';
const ERROR_EMAIL2 = 'L\'email n\'est pas valide';
const ERROR_MDP2 = 'Le mot de passe n\'est pas valide';

$errors2 = [
    'email2' => '',
    'password2' => '' 
];

// print_r($_SERVER);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Filter sanitize sur les input

$_POST = filter_input_array(INPUT_POST, [
    'password2' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'email2' => FILTER_SANITIZE_EMAIL,
]);  

// Déclaration variables

$password2 = $_POST['password2'] ?? '';
$email2 = $_POST['email2'] ?? '';

//Gestion erreurs

if(!$password2) {
    $errors2['password2'] = ERROR_REQUIRES2;
} else if(!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[+!@#$%])[0-9A-Za-z!@#$%]{8,20}$/', $password2) ) {
    $errors2['password2'] = ERROR_MDP2;
}

if (!$email2) {
    $errors2['email2'] = ERROR_REQUIRES2;
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors2['email2'] = ERROR_EMAIL2;
}   
}

?>


<form id="inscription" action="./connexion_inscription.php" method="POST" class="input-group">
                <input type="text" class="input-field" placeholder="Nom" required>
                <input type="text" class="input-field" placeholder="Prenom"  required>
                <input type="email" name="email2" class="input-field" placeholder="Email" required value= <?= isset($email2) ? "$email2" : ""?> >
                <?= $errors2['email2'] ? "<p>" . $errors2['email2'] . "<p>" : '' ?>
                <input type="text" class="input-field" name="password2" placeholder="Mot de passe" required title="Le mot de passe doit être compris entre 8 et 20 caractères et doit contenir au minimum:
                1 minuscule,
                1 majuscule,
                1 chiffre,
                1 caractère spécial (+!@#$%) "value= <?= isset($password2) ? "$password2" : ""?>>
                 <?= $errors2['password2'] ? "<p>" . $errors2['password2'] . "<p>" : '' ?>
                <input type="text" class="input-field"  name="repeatPassword" placeholder="Répétez votre mot de passe" title="Le mot de passe doit être compris entre 8 et 20 caractères et doit contenir au minimum:
                1 minuscule,
                1 majuscule,
                1 chiffre,
                1 caractère spécial (+!@#$%) " >
                <button type="submit" class="submit-btn inscr" id="passwordC">Inscription</button>
            </form>