<!DOCTYPE html>
<html lang="fr">
<head>
    <?php  require_once "./php/includes/head.php" ?>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" media="(max-width: 900px)" href="css/responsive/contactmedia.css">

    <title>FC Busnes - Site officiel - Contact</title>
</head>
<body>
    <?php  require_once "./php/includes/header.php" ?>
    <div class="section">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2533.0963180909544!2d2.519045515166317!3d50.58816305376216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47dd1ea218e520a9%3A0x85bc2dbe05e5dafa!2sStade!5e0!3m2!1sfr!2sfr!4v1632216852245!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <div class="adresse">
            <div class="fonc"><strong>Adresse du stade</strong>: <br>Rue de Lalleau 62350 Busnes</div>
            <div class="fonc"><strong>Adresse mail</strong> : <br>busnes.fc.548241@lfhf.fr</div>
            <div class="fonc"><strong>Page Facebook</strong> : <br><a class="facebook" href="https://www.facebook.com/FootballClubDeBusnes" target="_blank">https://www.facebook.com/FootballClubDeBusnes</a></div>
            <div class="organi">Organigramme du club</div>
            <div class="fonc"><strong>Président</strong> : <br>William Dhénin</div>
            <div class="fonc"><strong>Président adjoint</strong> : </div>
            <div class="fonc"><strong>Secrétaire</strong> : <br>Jérémy Lesage</div>
            <div class="fonc"><strong>Secrétaire adjoint</strong> : </div>
            <div class="fonc"><strong>Trésorier</strong> : <br>Pierre Béron</div>
            <div class="fonc"><strong>Trésorier adjoint</strong> : </div>
        </div>
    </div>
<p class="content">Contact entraîneur</p>
    <div class="entrainement">
        
        <div class="entrainementp1">
            <div>
                <ul class="entrai">U6-U7 </ul>
                <ul class="entrai">U8-U9</ul>
                <ul class="entrai">U10-U11</ul>
                <ul class="entrai">U12-U13</ul>
                <ul class="entrai">U14-U15</ul>
                <ul class="entrai">Vétérans</ul>
            </div>
        
            <div>
                <ul class="date">Christophe Blarel</ul>
                <ul class="date">Christophe Blarel</ul>
                <ul class="date">Julien Heniart</ul>
                <ul class="date">Jeremy Lesage</ul>
                <ul class="date">Thomas Chatelain</ul>
                <ul class="date">Julien Heniart</ul>
            </div>

            <div>
                <ul class="num">0629773840</ul>
                <ul class="num">0629773840</ul>
                <ul class="num">0667340155</ul>
                <ul class="num">0669037806</ul>
                <ul class="num">0614655711</ul>
                <ul class="num">0667340155</ul>
            </div>

        </div>
        <div class="entrainementp2">

            <div>
                <ul class="entrai">Séniors A</ul>
                <ul class="entrai">Séniors B</ul>
                <ul class="entrai">Séniors B</ul>
                <ul class="entrai">Séniors B</ul>
                <ul class="entrai">Féminines</ul>
                <ul class="entrai">Féminines</ul>
                
            </div>
        
            <div>
                <ul class="date">Erwan Leveque</ul>
                <ul class="date">Stephan Delsaux</ul>
                <ul class="date">Vincent Barrez</ul>
                <ul class="date">William Dhenin</ul>
                <ul class="date">Stephan Delsaux</ul>
                <ul class="date">Gaetan Hrycyk</ul>
                
            </div>

            <div>
                <ul class="num">0629550159</ul>
                <ul class="num">0788506889</ul>
                <ul class="num">0612366968</ul>
                <ul class="num">0625352517</ul>
                <ul class="num">0788506889</ul>
                <ul class="num">0768036294</ul>
                
            </div>

        </div>
    </div>
    <?php  require_once "./php/includes/footer.php" ?>
</body>
</html>


<script>

    const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");

    hamburger.addEventListener("click", mobileMenu);

    function mobileMenu() {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
    }
    </script>