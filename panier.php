<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once "./php/includes/head.php" ?>
    <link rel="stylesheet" href="css/panier.css">
    <title>Document</title>
</head>
<body>
    <?php require_once "./php/includes/header_boutique.php" ?>
    <div class="article-panier">
    <h1>PANIER</h1>
    <div class="articles-container"></div>
    <div class="total">
    <div class="total2">TOTAL: <span class="spTot"></span></div>  
</div>
<div class="button"></div>
</div>
<?php require_once "./php/includes/footer.php" ?>
</body>
<script src="js/panier.js" type="module">
</script>
</html>