<?php

$pdo = require  __DIR__ .  '/../../db.php';

class ActuDatabase
{

    private PDOStatement $stateCreate;
    private PDOStatement $stateUpdate;
    private PDOStatement $stateRead;
    private PDOStatement $stateReadAll;
    private PDOStatement $stateDelete;

    function __construct(private PDO $pdo)
    {
        $this->stateCreate = $pdo->prepare('
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

        $this->stateUpdate = $pdo->prepare('
            UPDATE articles_actu
            SET
            buteur1=:buteur1,
            buteur2=:buteur2,
            img=:img,
            prochainAffiche=:prochainAffiche,
            score1=:score1,
            score2=:score2,
            texte1=:texte1,
            texte2=:texte2,
            title=:title,
            date=:date,
            visibility=:visibility
            WHERE id=:id
        ');

        $this->stateRead = $pdo->prepare('SELECT * FROM articles_actu WHERE id=:id');

        $this->stateReadAll = $pdo->prepare('SELECT * FROM articles_actu');

        $this->stateDelete = $pdo->prepare('DELETE FROM articles_actu WHERE id=:id');
    }

    public function fetchAllArticle()
    {
        $this->stateReadAll->execute();
        return $this->stateReadAll->fetchAll();
    }

    public function fetchArticle(int $id)
    {
        $this->stateRead->bindValue(':id', $id);
        $this->stateRead->execute();
        return $this->stateRead->fetch();
    }

    public function createArticle($article)
    {
        $this->stateCreate->bindValue(':buteur1', $article['buteur1']);
        $this->stateCreate->bindValue(':buteur2', $article['buteur2']);
        $this->stateCreate->bindValue(':img', $article['img']);
        $this->stateCreate->bindValue(':prochainAffiche', $article['prochainAffiche']);
        $this->stateCreate->bindValue(':score1', $article['score1']);
        $this->stateCreate->bindValue(':score2', $article['score2']);
        $this->stateCreate->bindValue(':texte1', $article['texte1']);
        $this->stateCreate->bindValue(':texte2', $article['texte2']);
        $this->stateCreate->bindValue(':title', $article['title']);
        $this->stateCreate->bindValue(':date', time());
        $this->stateCreate->bindValue(':visibility', $article['visibility']);
        $this->stateCreate->execute();
        return $this->fetchArticle($this->pdo->lastInsertId());
    }

    public function updateArticle($article)
    {
        $this->stateUpdate->bindValue(':buteur1', $article['buteur1']);
        $this->stateUpdate->bindValue(':buteur2', $article['buteur2']);
        $this->stateUpdate->bindValue(':img', $article['img']);
        $this->stateUpdate->bindValue(':prochainAffiche', $article['prochainAffiche']);
        $this->stateUpdate->bindValue(':score1', $article['score1']);
        $this->stateUpdate->bindValue(':score2', $article['score2']);
        $this->stateUpdate->bindValue(':texte1', $article['texte1']);
        $this->stateUpdate->bindValue(':texte2', $article['texte2']);
        $this->stateUpdate->bindValue(':title', $article['title']);
        $this->stateUpdate->bindValue(':date', time());
        $this->stateUpdate->bindValue(':visibility', $article['visibility']);
        $this->stateUpdate->bindValue(':id', $article['id']);
        $this->stateUpdate->execute();
        return $article;
    }

    public function deleteArticle(int $id)
    {
        $this->stateDelete->bindValue(':id', $id);
        $this->stateDelete->execute();
        return $id;
    }
}

return new ActuDatabase($pdo);
