<?php

$actuDb = require __DIR__ . '/../database/models/databaseActu.php';

$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $id = $_GET['id'] ?? ''; 

    if ($id) {
        $article = $actuDb->fetchAllArticle($id);
        $idArticle = $article['id'];
        $title = $article['title'];
        $visibility = $article['viibility'];
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
    <link rel="stylesheet" href="css/admin-actu.css">
    <title>FC Busnes - Page Admin Actu</title>
</head>

<body>
    <div>
        <div class="admin">
            <h1>Page Admin Actu</h1>
            <label for="">Title:</label><input type="text" id="titleB">
            <label for="">Image:</label><input type="text" id="imgB">
            <label for="">Résumé Equipe1:</label><input type="text" id="texte1B">
            <label for="">Score Equipe1: </label><input type="text" id="score1B" placeholder="Score final: ">
            <label for="">Buteurs:</label><input type="text" id="buteur1B" placeholder="Buteurs: ">
            <label for="">Résumé Equipe2 :</label><input type="text" id="texte2B">
            <label for="">Score Equipe2: </label><input type="text" id="score2B" placeholder="Score final: ">
            <label for="">Buteurs:</label><input type="text" id="buteur2B" placeholder="Buteurs: ">
            <label for="">Prochaines rencontres:</label><input type="text" id="prochainAfficheB">
            <label for="">Visibilité:</label><input type="text" id="visibilityB" placeholder=" mettre true pour afficher, mettre false si on n'affiche pas l'article">
            <div class="button">
                <button id="insert">INSERT</button>
                <button name="id">SELECT ALL</button>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Titre</th>
                    <th>Visibilité</th>
                    <th>Editer</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($article as $a) : ?>
                <tr>
                    <th><?= $a['id'] ?></th>
                    <th><?= $a['title'] ?></th>
                    <th><?= $a['visibility'] ?></th>
                    <th><button class="edit">Editer</button></th>
                    <th><button class="delete">Delete</button></th>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div>
            <button class="button2"><a href="index_admin.php" class="return">Retour à l'accueil</a></button>
        </div>
    </div>
        <!-- <script src="js/admin-actu.js" type="module"></script> -->

</html>