<?php

$pdo = require "../../db.php";

$id = $_GET['edit'] ?? '';
setcookie('id', $id, time() + 60 * 60, '', '', false, true);

$stateReadOneArticle = $pdo->prepare('SELECT * FROM boutique WHERE id=:id');
$stateReadOneArticle->bindValue(':id', $id);
$stateReadOneArticle->execute();
$oneArticle = $stateReadOneArticle->fetch();

$id = $oneArticle['id'] ?? '' ;
$adulte = $oneArticle['adulte'] ?? '';
$denomination = $oneArticle['denomination'] ?? '';
$description = $oneArticle['description'] ?? '';
$enfant = $oneArticle['enfant'] ?? '';
$img = $oneArticle['img'] ?? '';
$optgroup = $oneArticle['optgroup'] ?? '';
$optgroup2 = $oneArticle['optgroup2'] ?? '';
$option1 = $oneArticle['option1'] ?? '';
$option2 = $oneArticle['option2'] ?? '';
$option3 = $oneArticle['option3'] ?? '';
$option4 = $oneArticle['option4'] ?? '';
$option5 = $oneArticle['option5'] ?? '';
$option6 = $oneArticle['option6'] ?? '';
$option7 = $oneArticle['option7'] ?? '';
$option8 = $oneArticle['option8'] ?? '';
$option9 = $oneArticle['option9'] ?? '';
$option10 = $oneArticle['option10'] ?? '';
$price1 = $oneArticle['price1'] ?? '';
$price2 = $oneArticle['price2'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adulte = $_POST['adulte'];
    $denomination = $_POST['denomination'];
    $description = $_POST['description'];
    $enfant = $_POST['enfant'];
    $img = $_POST['img'];
    $optgroup = $_POST['optgroup'];
    $optgroup2 = $_POST['optgroup2'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $option5 = $_POST['option5'];
    $option6 = $_POST['option6'];
    $option7 = $_POST['option7'];
    $option8 = $_POST['option8'];
    $option9 = $_POST['option9'];
    $option10 = $_POST['option10'];
    $price1 = $_POST['price1'];
    $price2 = $_POST['price2'];
    $idCookie = $_COOKIE['id'] ?? '';

    $stateUpdate= $pdo->prepare('
            UPDATE boutique
            SET
            adulte=:adulte,
            denomination=:denomination,
            description=:description,
            enfant=:enfant,
            img=:img,
            optgroup=:optgroup,
            optgroup2=:optgroup2,
            option1=:option1,
            option2=:option2,
            option3=:option3,
            option4=:option4,
            option5=:option5,
            option6=:option6,
            option7=:option7,
            option8=:option8,
            option9=:option9,
            option10=:option10,
            price1=:price1,
            price2=:price2
            WHERE id=:id
        ');

       $stateUpdate->bindValue(':id', $idCookie);
       $stateUpdate->bindValue(':adulte', $adulte);
       $stateUpdate->bindValue(':denomination', $denomination);
       $stateUpdate->bindValue(':description', $description);
       $stateUpdate->bindValue(':enfant', $enfant);
       $stateUpdate->bindValue(':img', $img);
       $stateUpdate->bindValue(':optgroup', $optgroup);
       $stateUpdate->bindValue(':optgroup2', $optgroup2);
       $stateUpdate->bindValue(':option1', $option1);
       $stateUpdate->bindValue(':option2', $option2);
       $stateUpdate->bindValue(':option3', $option3);
       $stateUpdate->bindValue(':option4', $option4);
       $stateUpdate->bindValue(':option5', $option5);
       $stateUpdate->bindValue(':option6', $option6);
       $stateUpdate->bindValue(':option7', $option7);
       $stateUpdate->bindValue(':option8', $option8);
       $stateUpdate->bindValue(':option9', $option9);
       $stateUpdate->bindValue(':option10', $option10);
       $stateUpdate->bindValue(':price1', $price1);
       $stateUpdate->bindValue(':price2', $price2);
       $stateUpdate->execute();

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin-boutique.css">
    <title>FC Busnes - Page Admin Boutique</title>
</head>
<body>
    <div>
    <form action="/admin/boutique/update.php" method="POST">
        <div class="admin">
            <h1>Page Admin Boutique</h1>
            <label for="">Title:</label><input type="text" name="denomination" value="<?= $denomination ?? '' ?>">
            <label for="">Image:</label><input type="text" name="img" value="<?= $img ?? '' ?>">
            <div class="option">
                <label for="">Option1:</label><input class="nameOption" type="text" name="optgroup" value="<?= $optgroup ?? '' ?>" placeholder="inscrire enfant ou taille">
                <div class="taille">
                    <label for="">Taille1:</label><input class="tailles" type="text" name="option1" value="<?= $option1 ?? '' ?>">
                    <label for="">Taille2:</label><input class="tailles" type="text" name="option2" value="<?= $option2 ?? '' ?>">
                    <label for="">Taille3:</label><input class="tailles" type="text" name="option3"value="<?= $option3 ?? '' ?>">
                    <label for="">Taille4:</label><input class="tailles" type="text" name="option4" value="<?= $option4 ?? '' ?>">
                    <label for="">Taille5:</label><input class="tailles" type="text" name="option5" value="<?= $option5 ?? '' ?>">
                </div>
            <label for="">Prix Enfant: </label><input class="price" type="text" name="price2" value="<?= $price2 ?? '' ?>" placeholder="prix + €">
            <label for="">Prix Enfant2: </label><input class="price2" type="text" name="enfant" value="<?= $enfant ?? '' ?>" placeholder="nottez prix enfant: prix + €">

            </div>
            <div class="option">
                <label for="">Option2:</label><input class="nameOption" type="text" name="optgroup2" value="<?= $optgroup2 ?? '' ?>" placeholder="inscrire adulte">
                <div class="taille">
                    <label for="">Taille1:</label><input class="tailles" type="text" name="option6" value="<?= $option6 ?? '' ?>">
                    <label for="">Taille2:</label><input class="tailles" type="text" name="option7" value="<?= $option7 ?? '' ?>">
                    <label for="">Taille3:</label><input class="tailles" type="text" name="option8" value="<?= $option8 ?? '' ?>">
                    <label for="">Taille4:</label><input class="tailles" type="text" name="option9" value="<?= $option9 ?? '' ?>">
                    <label for="">Taille5:</label><input class="tailles" type="text" name="option10" value="<?= $option10 ?? '' ?>">
                </div>
            <label for="">Prix Adulte: </label><input class="price" type="text" name="price1" value="<?= $price1 ?? '' ?>" placeholder="prix + €">
            <label for="">Prix Adulte2: </label><input class="price2" type="text" name="adulte" value="<?= $adulte ?? '' ?>" placeholder="nottez prix adulte: prix + €">
            </div>
            <label for="">Description:</label><input type="text" name="description" value="<?= $description ?? '' ?>">
            <div class="button">
                <button><a href="../admin-boutique.php">MODIFIER</a></button>

            </div>
        </div>
        <div>
            <button class="button2"><a href="../index_admin.php">Retour à l'accueil</a></button>
        </div>
    </div>
</body>
<!-- <script src="js/admin-boutique.js" type="module"></script> -->
</html>