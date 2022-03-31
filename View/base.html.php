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
            <a href="/index.php?c=user" class="buttonNavBar viewUser">Voir les utilisateurs</a>
            <a href="/index.php?c=article&a=add-article" class="buttonNavBar addArticle">Ajouter un article</a>
        </div>
        <div id="user"> <?php
            if (!UserController::userConnected()) { ?>
                <a href="/index.php?c=user&a=register" class="linkUser">Inscription</a>
                <a href="/index.php?c=user&a=login" class="linkUser">Connexion</a> <?php
            }
            else { ?>
                <a href="/index.php?c=user&a=profil" class="profil"><i class="fas fa-address-book user"></i><?= ($_SESSION['user'])->getFirstname() ?></a>
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
                <a href="/index.php?c=article" class="buttonNavBar"><i class="fas fa-server"></i>Articles</a>
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

<?php
if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
    foreach ($errors as $error) { ?>
        <div class="error"><?= $error ?></div> <?php
    }
}

if (isset($_SESSION['success'])) {
    $message = $_SESSION['success'];
    unset($_SESSION['success']); ?>
    <div class="success"><?= $message ?></div> <?php
}
?>

<main>
    <div class="middle"></div>
    <div class="container"><?= $html ?></div>
    <div class="middle"></div>
</main>

    <script src="https://kit.fontawesome.com/84aafb4cd1.js" crossorigin="anonymous"></script>
    <script src="/assets/js/app.js"></script>
</body>
</html>