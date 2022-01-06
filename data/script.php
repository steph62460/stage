<?php 

$articles = json_decode(file_get_contents('../JSON/boutique.json'), true);

$dns = "mysql:host=localhost;dbname=fcbusnes";
$users = 'root';
$password = 'Louise150717+';

$pdo = new PDO($dns, $users, $password);

$statement = $pdo->prepare('
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
    price,
    price1,
    price2,
    qte,
    taille,
    visibility
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
    :price,
    :price1,
    :price2,
    :qte,
    :taille,
    :visibility
)
');

foreach ($articles as $a) {
    $statement->bindValue(':adulte', $a['adulte']);
    $statement->bindValue(':denomination', $a['denomination']);
    $statement->bindValue(':description', $a['description']);
    $statement->bindValue(':enfant', $a['enfant']);
    $statement->bindValue(':img', $a['img']);
    $statement->bindValue(':optgroup', $a['optgroup']);
    $statement->bindValue(':optgroup2', $a['optgroup2']);
    $statement->bindValue(':option1', $a['option1']);
    $statement->bindValue(':option2', $a['option2']);
    $statement->bindValue(':option3', $a['option3']);
    $statement->bindValue(':option4', $a['option4']);
    $statement->bindValue(':option5', $a['option5']);
    $statement->bindValue(':option6', $a['option6']);
    $statement->bindValue(':option7', $a['option7']);
    $statement->bindValue(':option8', $a['option8']);
    $statement->bindValue(':option9', $a['option9']);
    $statement->bindValue(':option10', $a['option10']);
    $statement->bindValue(':price', $a['price']);
    $statement->bindValue(':price1', $a['price1']);
    $statement->bindValue(':price2', $a['price2']);
    $statement->bindValue(':qte', $a['qte']);
    $statement->bindValue(':taille', $a['taille']);
    $statement->bindValue(':visibility', $a['visibility']);
    $statement->execute();
};