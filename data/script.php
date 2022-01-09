<?php 

$articles = json_decode(file_get_contents('../JSON/articles.json'), true);

$dns = "mysql:host=localhost;dbname=fcbusnes";
$users = 'root';
$password = 'Louise150717+';

$pdo = new PDO($dns, $users, $password);

$statement = $pdo->prepare('
INSERT INTO articles_actu (
    buteur1,
    buteur2,
    img,
    prochainAffiche,
    score1,
    score2,
    texte1,
    texte2,
    title,
    date,
    visibility
) VALUES (
    :buteur1,
    :buteur2,
    :img,
    :prochainAffiche,
    :score1,
    :score2,
    :texte1,
    :texte2,
    :title,
    :date,
    :visibility
)
');

foreach ($articles as $a) {
    $statement->bindValue(':buteur1', $a['buteur1']);
    $statement->bindValue(':buteur2', $a['buteur2']);
    $statement->bindValue(':img', $a['img']);
    $statement->bindValue(':prochainAffiche', $a['prochainAffiche']);
    $statement->bindValue(':score1', $a['score1']);
    $statement->bindValue(':score2', $a['score2']);
    $statement->bindValue(':texte1', $a['texte1']);
    $statement->bindValue(':texte2', $a['texte2']);
    $statement->bindValue(':title', $a['title']);
    $statement->bindValue(':date', $a['date']);
    $statement->bindValue(':visibility', $a['visibility']);
    $statement->execute();
};