<?php

$pdo = require './db.php';
$id=$_GET["id"];
$stateDetailArticle = $pdo->prepare('SELECT * FROM boutique WHERE id=:id');
$stateDetailArticle->bindValue(":id", $id);
$stateDetailArticle->execute();
$detailArticle=$stateDetailArticle->fetch();

// echo "<pre>";
// echo $id;
// var_dump($detailArticle);
// echo "</pre>";

// die();

?> 

<!DOCTYPE html>
<html lang="fr">
<head>
  <?php  require_once "./php/includes/head.php" ?>
    <link rel="stylesheet" href="css/article_boutique.css">
    <title>FC Busnes - Boutique - Détail article</title>
</head>
<body>
<?php  require_once "./php/includes/header_boutique.php" ?>
<section class="section">
    <div class="article single-product">
       <div class="row">
         <div class="produit">
           <img src="<?= $detailArticle['img'] ?>" alt="<?= $detailArticle['denomination'] ?>">
          </div>
           <div class="produit2">
             <h2><?= $detailArticle['denomination'] ?></h2>
             <select>
               <option value="">Choix Taille</option>
                 <optgroup label="<?= $detailArticle['optgroup'] ?>"></optgroup>
                   <option value=""><?= $detailArticle['option1'] ?></option>
                   <option value=""><?= $detailArticle['option2'] ?></option>
                   <option value=""><?= $detailArticle['option3'] ?></option>
                   <option value=""><?= $detailArticle['option4'] ?></option>
                   <option value=""><?= $detailArticle['option5'] ?></option>
                 <optgroup label="<?= $detailArticle['optgroup2'] ?>"></optgroup>
                   <option value=""><?= $detailArticle['option6'] ?></option>
                   <option value=""><?= $detailArticle['option7'] ?></option>
                   <option value=""><?= $detailArticle['option8'] ?></option>
                   <option value=""><?= $detailArticle['option9'] ?></option>
                   <option value=""><?= $detailArticle['option10'] ?></option>
             </select>
             <p>Qte: 
             <input type="number" min="1" value="1">
            </p>
             <h3><?= $detailArticle['price1'] ?> €</h3>
             <div class="divbutton">
               <button class="btn">Ajoutez au panier</button>
             </div>
             <h4>Détail du Produit</h4>
             <p><?= $detailArticle['description'] ?></p>
           </div>
    </div>
    </div>
</section>
<?php  require_once "./php/includes/footer.php" ?>
</body>
<!-- <script src="js/article_boutique.js" type="module"></script> -->
</html>

