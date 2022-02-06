<?php

$pdo2 = require './isLoggedIn.php';
$user = isLoggedIn();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
        require_once "./php/includes/head.php"
    ?>
    <link rel="stylesheet" href="css/calendrier.css">
    <title>FC Busnes - Site officiel - Calendriers/Classements</title>
</head>
<body>
    <?php require_once "./php/includes/header.php" ?>
    <div class="gpp">
        <div class="groupe">
            <h3>Calendrier</h3>
            <div class="groupea"><a href="https://artois.fff.fr/recherche-clubs/?scl=25348&tab=resultats&subtab=calendar&competition=383494&stage=1&group=5&label_group=POULE%20E" target="_blank">U10-U11</a></div>
            <div class="groupea"><a href="https://artois.fff.fr/recherche-clubs/?scl=25348&tab=resultats&subtab=calendar&competition=383486&stage=1&group=8&label_group=POULE%20H" target="_blank">U12-U13</a></div>
            <div class="groupea"><a href="https://artois.fff.fr/recherche-clubs/?scl=25348&tab=resultats&subtab=calendar&competition=383541&stage=1&group=1&label_group=POULE%200" target="_blank">U14-U15</a></div>
            <div class="groupea"><a href="https://artois.fff.fr/recherche-clubs/?scl=25348&tab=resultats&subtab=calendar&competition=383478&stage=1&group=1&label_group=POULE%20A" target="_blank">Seniors A</a></div>
            <div class="groupea"><a href="https://artois.fff.fr/recherche-clubs/?scl=25348&tab=resultats&subtab=calendar&competition=383479&stage=1&group=6&label_group=POULE%20F" target="_blank">Seniors B</a></div>
            <div class="groupea"><a href="https://artois.fff.fr/recherche-clubs/?scl=25348&tab=resultats&subtab=calendar&competition=383496&stage=1&group=3&label_group=POULE%20C" target="_blank">Féminines</a></div>
            <div class="groupea"><a href="https://artois.fff.fr/recherche-clubs/?scl=25348&tab=resultats&subtab=calendar&competition=383482&stage=1&group=1&label_group=POULE%20A%20-%20SAMEDI" target="_blank">Vétérans</a></div>


        </div>
            <div class="groupe2">
                <h3>Classement</h3>   
            <div class="groupea"><a href="https://artois.fff.fr/recherche-clubs/?scl=25348&tab=resultats&subtab=ranking&competition=383478&stage=1&group=1&label=SENIORS%20D5" target="_blank">Seniors A</a></div>
            <div class="groupea"><a href="https://artois.fff.fr/recherche-clubs/?scl=25348&tab=resultats&subtab=ranking&competition=383479&stage=1&group=6&label=SENIORS%20D6" target="_blank">Seniors B</a></div>
            <div class="groupea"><a href="https://artois.fff.fr/recherche-clubs/?scl=25348&tab=resultats&subtab=ranking&competition=383496&stage=1&group=3&label=FEMININES%20SENIORS%20%C3%80%207" target="_blank">Féminines</a></div>
            <div class="groupea"><a href="https://artois.fff.fr/recherche-clubs/?scl=25348&tab=resultats&subtab=ranking&competition=383482&stage=1&group=1&label=VETERANS%20%C3%80%207" target="_blank">Vétérans</a></div>
            </div>
    </div>
<?php require_once "./php/includes/footer.php" ?>
</body>
<script>
const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");
    
    hamburger.addEventListener("click", mobileMenu);
    
    function mobileMenu() {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
    }
    </script>
</html>