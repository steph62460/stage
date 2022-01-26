<?php

$boutiqueDb = require '../db.php';

$readAll = $pdo->prepare('SELECT * FROM boutique');
$readAll->execute();
$selectAll = $readAll->fetchAll();
$article = [];


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
        
        $stateCreate = $pdo->prepare('
        INSERT INTO boutique (
            adulte,
            denomination,
            description,
            enfant,
            img,
            optgroup,
            optgroup2,
            option1,
            option2,
            option3,
            option4,
            option5,
            option6,
            option7,
            option8,
            option9,
            option10,
            price1,
            price2
        ) VALUES (
            :adulte,
            :denomination,
            :description,
            :enfant,
            :img,
            :optgroup,
            :optgroup2,
            :option1,
            :option2,
            :option3,
            :option4,
            :option5,
            :option6,
            :option7,
            :option8,
            :option9,
            :option10,
            :price1,
            :price2
        )
        ');

        $stateCreate->bindValue(':adulte', $adulte);
        $stateCreate->bindValue(':denomination', $denomination);
        $stateCreate->bindValue(':description', $description);
        $stateCreate->bindValue(':enfant', $enfant);
        $stateCreate->bindValue(':img', $img);
        $stateCreate->bindValue(':optgroup', $optgroup);
        $stateCreate->bindValue(':optgroup2', $optgroup2);
        $stateCreate->bindValue(':option1', $option1);
        $stateCreate->bindValue(':option2', $option2);
        $stateCreate->bindValue(':option3', $option3);
        $stateCreate->bindValue(':option4', $option4);
        $stateCreate->bindValue(':option5', $option5);
        $stateCreate->bindValue(':option6', $option6);
        $stateCreate->bindValue(':option7', $option7);
        $stateCreate->bindValue(':option8', $option8);
        $stateCreate->bindValue(':option9', $option9);
        $stateCreate->bindValue(':option10', $option10);
        $stateCreate->bindValue(':price1', $price1);
        $stateCreate->bindValue(':price2', $price2);
        $stateCreate->execute();
    
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
    <link rel="stylesheet" href="css/admin-boutique.css">
    <title>FC Busnes - Page Admin Boutique</title>
</head>
<body>
    <div>
    <form action="/admin/admin-boutique.php" method="POST">
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
                <button>PUBLIER</button>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Denomination</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>EDITER</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($selectAll as $a) : ?>
                    <tr>
                        <td><?= $a['id'] ?? '' ?></td>
                        <td><img src="<?= $a['img'] ?? '' ?>" alt="" class="img"></td>
                        <td><?= $a['denomination'] ?? '' ?></td>
                        <td><?= $a['description'] ?? '' ?></td>
                        <td><?= $a['price'] ?? '' ?></td>
                        <td><button class="edit"><a href="./boutique/update.php?edit=<?= $a['id'] ?>">EDITER</a></button></td>
                        <td><button class="delete"><a href="./boutique/delete.php?delete=<?= $a['id'] ?>">SUPPRIMER</a></button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div>
            <button class="button2">Retour à l'accueil</button>
        </div>
    </div>
</body>
<!-- <script src="js/admin-boutique.js" type="module"></script> -->
</html>