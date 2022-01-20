<?php

$actuDb = require __DIR__ . '/../database/models/databaseActu.php';

$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = $_GET['id'] ?? '';
$selectAll = $_GET['select'] ?? '';
$editOne = $_GET['edit'] ?? '';
setcookie('id', $editOne, time() + 60 * 60, '', '', false, true);
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_COOKIE['id'] ?? '';
    if ($id) {
        // echo "ok";
        // die();
        // $id = $_COOKIE['id'] ?? '';
        $article['id'] = $id;
        $article['title'] = $_POST['title'];
        $article['img'] = $_POST['img'];
        $article['texte1'] = $_POST['texte1'];
        $article['score1'] = $_POST['score1'];
        $article['buteur1'] = $_POST['buteur1'];
        $article['texte2'] = $_POST['texte2'];
        $article['score2'] = $_POST['score2'];
        $article['buteur2'] = $_POST['buteur2'];
        $article['prochainAffiche'] = $_POST['prochainAffiche'];
        $article['date'] = time();
        $article['visibility'] = $_POST['visibility'];
        // var_dump($article);
        // die();
        $actuDb->updateArticle($article);
    } else {
        // echo "ko";
        // die();
        $article['title'] = $_POST['title'];
        $article['img'] = $_POST['img'];
        $article['texte1'] = $_POST['texte1'];
        $article['score1'] = $_POST['score1'];
        $article['buteur1'] = $_POST['buteur1'];
        $article['texte2'] = $_POST['texte2'];
        $article['score2'] = $_POST['score2'];
        $article['buteur2'] = $_POST['buteur2'];
        $article['prochainAffiche'] = $_POST['prochainAffiche'];
        $article['date'] = time();
        $article['visibility'] = $_POST['visibility'];
        $actuDb->createArticle($article);
    }
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
        <form action="/admin/admin-actu.php" method="POST">
            <div class="admin">

                <h1>Page Admin Actu</h1>
                <label for="">Title:</label><input type="text" name="title" value="<?= $title ?? '' ?>">
                <label for="">Image:</label><input type="text" name="img" value="<?= $img ?? '' ?>">
                <label for="">Résumé Equipe1:</label><input type="text" name="texte1" value="<?= $texte1 ?? '' ?>">
                <label for="">Score Equipe1: </label><input type="text" name="score1" placeholder="Score final: " value="<?= $score1 ?? '' ?>">
                <label for="">Buteurs:</label><input type="text" name="buteur1" placeholder="Buteurs: " value="<?= $buteur1 ?? '' ?>">
                <label for="">Résumé Equipe2 :</label><input type="text" name="texte2" value="<?= $texte2 ?? '' ?>">
                <label for="">Score Equipe2: </label><input type="text" name="score2" placeholder="Score final: " value="<?= $score2 ?? '' ?>">
                <label for="">Buteurs:</label><input type="text" name="buteur2" placeholder="Buteurs: " value="<?= $buteur2 ?? '' ?>">
                <label for="">Prochaines rencontres:</label><input type="text" name="prochainAffiche" value="<?= $prochainMatch ?? '' ?>">
                <label for="">Visibilité:</label><input type="text" name="visibility" value="<?= $visibility ?? '' ?>" placeholder=" mettre true pour afficher, mettre false si on n'affiche pas l'article">
                <div class="button">
                    <button><?= $editOne ? "UPDATE" : "INSERT" ?></button>
                    <button type="button"><a href="./admin-actu.php?select=ok" name="id">SELECT ALL</a></button>
                </div>

            </div>
        </form>
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
                        <td><?= $a['id'] ?? '' ?></td>
                        <td><?= $a['title'] ?? '' ?></td>
                        <td><?= $a['visibility'] ?? '' ?></td>
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