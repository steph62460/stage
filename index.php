<?php


$pdo = require_once './db.php';

$pdo2 = require './isLoggedIn.php';
$user = isLoggedIn();


$stateIndex = $pdo->prepare('SELECT * FROM articles_actu ORDER BY id DESC');
$stateIndex->execute();
$index=$stateIndex->fetchAll();

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    require_once "./php/includes/head.php"
    ?>
    <title>FC Busnes - Site officiel - Accueil</title>
</head>
<!---------------------------------------------------------debut du header----------------------------------------------------------------------->

<body>
    <?php require_once "./php/includes/header.php"  ?>
    <div class="connexion">
        <?php if($user) : ?>
            <div>
            <p>Bienvenue <?= $user['prenom'] . ' ' . $user['nom'] ?></a></p>
            </div>
            <?php endif ;?>
    </div>
    <!---------------------------------------------------------fin du header----------------------------------------------------------------------->

    <div class="article-panier">
        <img class="imagebody" src="img/test.jpg" alt="image du stade">
        <div class="bmatchinfo">
            <div class="bmatch">
                <!---------------------------------------------------------carrousel 1----------------------------------------------------------------------->
                <div class="ent">DERNIERS MATCHS</div>
                <div class="carousel">
                    <img src="img/prochainmatch/1.png" />
                    <img src="img/prochainmatch/2.png" />
                    <img src="img/prochainmatch/3.png" />
                    <img src="img/prochainmatch/4.png" />
                    <!-- <img src="img/prochainmatch/5.png" /> -->
                </div>


                <!--------------------------------------------------------- fin carrousel 1----------------------------------------------------------------------->

                <!---------------------------------------------------------  carrousel 2----------------------------------------------------------------------->
                <div class="ent">MATCHS A VENIR</div>
                <div class="carousel2">
                    <img src="img/match a venir/1.png" />
                    <img src="img/match a venir/2.png" />
                    <img src="img/match a venir/3.png" />
                    <img src="img/match a venir/4.png" />
                    <img src="img/match a venir/5.png" />
                    <img src="img/match a venir/6.png" />
                </div>
            </div>

            <!--------------------------------------------------------- fin carrousel 2----------------------------------------------------------------------->



            <div class="bactu">
                <h2>ACTUALIT??</h2>
                <?php foreach ($index as $i) : ?>
                <div class="bactuinfo">
                    <a class="lien" href="page_actu.php?id=<?=$i['id']?>&cat=articles"><?= $i['title']?></a>
                    </div>
                    <?php endforeach; ?>
            </div>

        </div>
        <p class="ent">Jours d'entrainement</p>
        <div class="tabprin">
            <div class=tab>
                <div class="coln1">
                    <div class="tabg">U6-U7</div>
                    <div class="tabmar">Mercredi</div>
                    <div class="tabd">14H - 15H30</div>
                </div>
                <div class="coln2">
                    <div class="tabg">U8-U9</div>
                    <div class="tabmar">Mercredi</div>
                    <div class="tabd">14H - 15H30</div>
                </div>
                <div class="coln2">
                    <div class="tabg">U10-U11</div>
                    <div class="tabmar">Mercredi</div>
                    <div class="tabd">17H - 18H30</div>
                </div>
                <div class="coln2">
                    <div class="tabg">U12-U13</div>
                    <div class="tabmar">Mercredi</div>
                    <div class="tabd">17H15 - 18H45</div>
                </div>
                <div class="coln2">
                    <div class="tabg">U14-U15</div>
                    <div class="tabmar">Mardi</div>
                    <div class="tabd">18H - 19H30</div>
                </div>
            </div>

            <div class=tab>

                <div class="coln1">
                    <div class="tabg">V??t??rans</div>
                    <div class="tabmar">Jeudi</div>
                    <div class="tabd">18H30 - 20H</div>
                </div>
                <div class="coln2">
                    <div class="tabg">S??niors</div>
                    <div class="tabmar">Mardi<br>Vendredi</div>
                    <div class="tabd">19H - 21H <br> 19H - 21H</div>
                </div>
                <div class="coln2">
                    <div class="tabg">F??minines</div>
                    <div class="tabmar">Mercredi<br> Vendredis</div>
                    <div class="tabd">17h30 - 19H<br> 18H - 19H30</div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once "./php/includes/footer.php"
    ?>
</body>

</html>
<script src="js/index.js" type="module"></script>