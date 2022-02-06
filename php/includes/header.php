
<header class="header">
        <nav class="navbar">
            <a href="index.php" class="nav-logo"><img src="img/logo club busnes.png">FC Busnes</a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="actu.php" class="nav-link">
                    <img class="logoHeader" src="../../img/news.png" alt="">Actualité</a>
                </li>
                <li class="nav-item">
                    <a href="equipes.php" class="nav-link">
                    <img class="logoHeader" src="../../img/teams.png" alt="">Equipes</a>
                </li>
                <li class="nav-item">
                    <a href="calendrier.php" class="nav-link">
                    <img class="logoHeader" src="../../img/cal.png" alt="">Calendrier et Classements</a>
                </li>
                <li class="nav-item">

                    <a href="boutique.php" class="nav-link">
                    <img class="logoHeader" src="../../img/boutiques.png" alt="">Boutique</a>
                </li>
                <li class="nav-item">

                    <a href="contact.php" class="nav-link">
                    <img class="logoHeader" src="../../img/contact.png" alt="">Contact</a>
                </li>
                <?php if($user) : ?>
                    <li class="nav-item">
                    <div class="logoProfil">
                    <a href="profile.php" class="nav-link nav-link2"><img clas="login" src="../../img/profile.png" alt="">
                    <p class="logInOut">Mon profil</p>
                    </a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="logoProfil">
                    <a href="logout.php" class="nav-link nav-link2"><img clas="login" src="../../img/logout.png" alt="">
                    <p class="logInOut">Déconnexion</p>
                    </a>
                    </div>
                </li>
                <?php else : ?>
                <li class="nav-item">
                    <div class="logoProfil">
                    <a href="connexion.php" class="nav-link nav-link2"><img clas="login" src="../../img/connexion.jpg" alt="">
                    <p class="logInOut">Connexion/Inscription</p>
                    </a>
                    </div>
                </li>
                <?php endif; ?>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>