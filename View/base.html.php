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
                <a href="/index.php?c=user" class="buttonNavBar">Voir les utilisateurs</a>
        </div>
        <div id="user"> <?php
            if (!UserController::userConnected()) { ?>
                <a href="/index.php?c=user&a=register" class="linkUser">Inscription</a>
                <a href="/index.php?c=user&a=login" class="linkUser">Connexion</a> <?php
            }
            else { ?>
                <a href="/index.php?c=user&a=profile" class="profil"><i class="fas fa-address-book user"></i><?= $_SESSION['user']->getFirstname() ?></a>
                <a href="/index.php?c=user&a=logout" class="linkUser">Deconnexion</a> <?php
            }
            ?>
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
    <div class="middle"></div>
    <div class="container"><?= $html ?></div>
    <div class="middle"></div>
</main>
<?php
if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
$errors = $_SESSION['errors'];
unset($_SESSION['errors']);
foreach ($errors as $error) { ?>
<div><?= $error ?></div> <?php
    }
}

if (isset($_SESSION['success'])) {
    $message = $_SESSION['success'];
    unset($_SESSION['success']); ?>
<div><?= $message ?></div> <?php
}
?>


<script src="https://kit.fontawesome.com/84aafb4cd1.js" crossorigin="anonymous"></script>
<script src="/assets/js/app.js"></script>
</body>
</html>