<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<header>
    <div id="head">
        <div id="info">
            <span id="date"></span>
            <span class="clock"></span>
            <a href="" class="buttonNavBar">Faire un don<i class="fas fa-euro-sign"></i></a>
            <a href="" class="buttonNavBar">Voter pour le serveur !</a>
        </div>
        <div id="user">
            <a href="/index.php?c=form" class="linkUser">Inscription</a>
            <a href="" class="linkUser">Connexion</a>
        </div>
    </div>

    <div id="backgroundHead">

    </div>

    <div id="navBar">
        <ul id="bar">
            <li>
                <a href="/index.php?c=home" class="buttonNavBar"><i class="fas fa-home"></i>Acceuil</a>
            </li>
            <li>
                <a href="" class="buttonNavBar"><i class="fas fa-server"></i>Nos Serveurs</a>
            </li>
            <li>
                <a href="https://discord.gg/PFh2YzMvyF" class="buttonNavBar"><i class="fab fa-discord"></i>Discord</a>
            </li>
            <li>
                <a href="" class="buttonNavBar"><i class="fas fa-archive"></i>Tutos</a>
            </li>
        </ul>
    </div>
</header>

<main>
    <?= $html ?>
</main>

<script src="https://kit.fontawesome.com/84aafb4cd1.js" crossorigin="anonymous"></script>
<script src="/assets/js/app.js"></script>
</body>
</html>