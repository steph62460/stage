<?php

$actuDb = require __DIR__ . '/../database/models/databaseActu.php';

$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = $_GET['id'] ?? '';
$selectAll = $_GET['select'] ?? '';
$editOne = $_GET['edit'] ?? '';
$article = [];

if ($selectAll) {
    $article = $actuDb->fetchAllArticle($id);
}

if ($editOne) {
    $oneActu = $actuDb->fetchArticle($editOne);
    $title = $oneActu['title'];
    $img = $oneActu['img'];
    $texte1 = $oneActu['texte1'];
    $score1 = $oneActu['score1'];
    $buteur1 = $oneActu['buteur1'];
    $texte2 = $oneActu['texte2'];
    $score2 = $oneActu['score2'];
    $buteur2 = $oneActu['buteur2'];
    $prochainMatch = $oneActu['prochainAffiche'];
    $visibility = $oneActu['visibility'];
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin-actu.css">
    <title>FC Busnes - Page Admin Actu</title>
</head>

<body>
    <div>
        <div class="admin">
            <h1>Page Admin Actu</h1>
            <label for="">Title:</label><input type="text" value="<?= $title ?? '' ?>">
            <label for="">Image:</label><input type="text" value="<?= $img ?? '' ?>">
            <label for="">Résumé Equipe1:</label><input type="text" value="<?= $texte1 ?? '' ?>">
            <label for="">Score Equipe1: </label><input type="text" placeholder="Score final: " value="<?= $score1 ?? '' ?>">
            <label for="">Buteurs:</label><input type="text" placeholder="Buteurs: " value="<?= $buteur1 ?? '' ?>">
            <label for="">Résumé Equipe2 :</label><input type="text" value="<?= $texte2 ?? '' ?>">
            <label for="">Score Equipe2: </label><input type="text" placeholder="Score final: " value="<?= $score2 ?? '' ?>">
            <label for="">Buteurs:</label><input type="text" placeholder="Buteurs: " value="<?= $buteur2 ?? '' ?>">
            <label for="">Prochaines rencontres:</label><input type="text" value="<?= $prochainMatch ?? '' ?>">
            <label for="">Visibilité:</label><input type="text" value="<?= $visibility ?? '' ?>" placeholder=" mettre true pour afficher, mettre false si on n'affiche pas l'article">
            <div class="button">
                <button><a href="./admin-actu.php?insert" name="insert"><?= $id ? "UPDATE" :"INSERT" ?></a></button>
                <button><a href="./admin-actu.php?select=ok" name="id" >SELECT ALL</a></button>
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
                <?php foreach ($article as $a) : ?>
                    <tr>
                        <td><?= $a['id'] ?></td>
                        <td><?= $a['title'] ?></td>
                        <td><?= $a['visibility'] ?></td>
                        <td><button class="edit"><a href="./admin-actu.php?edit=<?= $a['id'] ?>" name="id">EDITER</a></button></td>
                        <td><button class="delete">Delete</button></td>
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