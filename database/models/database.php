<?php

$pdo = require  __DIR__ .  '/../../db.php';

class ArticleDatabase {

    private PDOStatement $stateCreate;
    private PDOStatement $stateUpdate;
    private PDOStatement $stateRead;
    private PDOStatement $stateReadAll;
    private PDOStatement $stateDelete;

    function __construct(private PDO $pdo)
    {
        $this->stateCreate = $pdo->prepare('
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
    
        $this->stateUpdate = $pdo->prepare('
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
            price=:price,
            price1=:price1,
            price2=:price2,
            qte=:qte,
            taille=:taille,
            visibility=:visibility
            WHERE id=:id
        '); 

        $this->stateRead = $pdo->prepare('SELECT * FROM boutique WHERE id=:id');

        $this->stateReadAll = $pdo->prepare('SELECT * FROM boutique');

        $this->stateDelete = $pdo->prepare('DELETE FROM boutique WHERE id=:id');
    }

    public function fetchAllArticle() {
        $this->stateReadAll->execute();
        return $this->stateReadAll->fetchAll();
    }

    public function fetchArticle(int $id){
        $this->stateRead->bindValue(':id', $id);
        $this->stateRead->execute();
        return $this->stateRead->fetch();
    }

    public function createArticle($article) {
        $this->stateCreate->bindValue(':adulte', $article['adulte']);
        $this->stateCreate->bindValue(':denomination', $article['denomination']);
        $this->stateCreate->bindValue(':description', $article['description']);
        $this->stateCreate->bindValue(':enfant', $article['enfant']);
        $this->stateCreate->bindValue(':img', $article['img']);
        $this->stateCreate->bindValue(':optgroup', $article['optgroup']);
        $this->stateCreate->bindValue(':optgroup2', $article['optgroup2']);
        $this->stateCreate->bindValue(':option1', $article['option1']);
        $this->stateCreate->bindValue(':option2', $article['option2']);
        $this->stateCreate->bindValue(':option3', $article['option3']);
        $this->stateCreate->bindValue(':option4', $article['option4']);
        $this->stateCreate->bindValue(':option5', $article['option5']);
        $this->stateCreate->bindValue(':option6', $article['option6']);
        $this->stateCreate->bindValue(':option7', $article['option7']);
        $this->stateCreate->bindValue(':option8', $article['option8']);
        $this->stateCreate->bindValue(':option9', $article['option9']);
        $this->stateCreate->bindValue(':option10', $article['option10']);
        $this->stateCreate->bindValue(':price', $article['price']);
        $this->stateCreate->bindValue(':price1', $article['price1']);
        $this->stateCreate->bindValue(':price2', $article['price2']);
        $this->stateCreate->bindValue(':qte', $article['qte']);
        $this->stateCreate->bindValue(':taille', $article['taille']);
        $this->stateCreate->bindValue(':visibility', $article['visibility']);
        $this->stateCreate->execute();
        return $this->fetchArticle($this->pdo->lastInsertId());
    }

    public function updateArticle($article) {
        $this->stateUpdate->bindValue(':adulte', $article['adulte']);
        $this->stateUpdate->bindValue(':denomination', $article['denomination']);
        $this->stateUpdate->bindValue(':description', $article['description']);
        $this->stateUpdate->bindValue(':enfant', $article['enfant']);
        $this->stateUpdate->bindValue(':img', $article['img']);
        $this->stateUpdate->bindValue(':optgroup', $article['optgroup']);
        $this->stateUpdate->bindValue(':optgroup2', $article['optgroup2']);
        $this->stateUpdate->bindValue(':option1', $article['option1']);
        $this->stateUpdate->bindValue(':option2', $article['option2']);
        $this->stateUpdate->bindValue(':option3', $article['option3']);
        $this->stateUpdate->bindValue(':option4', $article['option4']);
        $this->stateUpdate->bindValue(':option5', $article['option5']);
        $this->stateUpdate->bindValue(':option6', $article['option6']);
        $this->stateUpdate->bindValue(':option7', $article['option7']);
        $this->stateUpdate->bindValue(':option8', $article['option8']);
        $this->stateUpdate->bindValue(':option9', $article['option9']);
        $this->stateUpdate->bindValue(':option10', $article['option10']);
        $this->stateUpdate->bindValue(':price', $article['price']);
        $this->stateUpdate->bindValue(':price1', $article['price1']);
        $this->stateUpdate->bindValue(':price2', $article['price2']);
        $this->stateUpdate->bindValue(':qte', $article['qte']);
        $this->stateUpdate->bindValue(':taille', $article['taille']);
        $this->stateUpdate->bindValue(':visibility', $article['visibility']);
        return $article;
    }

    public function deleteArticle(int $id) {
        $this->stateDelete->bindValue(':id', $id);
        $this->stateDelete->execute();
        return $id;
    }
}

return new ArticleDatabase($pdo);