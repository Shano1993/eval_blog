<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
</head>
<body>
<h1>Formulaire d'inscription</h1>

<div class="box">
    <form action="/index.php?c=form&a=confirm-register" method="post">
        <div class="input-container">
            <input type="text" name="firstname" id="id-firstname">
            <label for="id-firstname">Votre prénom</label>
        </div>

        <div class="input-container">
            <input type="text" name="lastname" id="id-lastname">
            <label for="id-lastname">Votre nom</label>
        </div>

        <div class="input-container">
            <input type="password" name="password" id="id-password">
            <label for="id-password">Mot de passe</label>
        </div>

        <div class="input-container">
            <input type="password" name="passwordRepeat" id="id-passwordRepeat">
            <label for="id-passwordRepeat">Répéter le mot de passe</label>
        </div>

        <div class="input-container">
            <input type="email" name="mail" id="id-mail">
            <label for="id-mail">Adresse Email</label>
        </div>

        <div class="input-container">
            <input type="text" name="age" id="age">
            <label for="id-age">Votre âge</label>
        </div>

        <div class="button-container">
            <input type="submit" class="btn" name="submit-register" value="Confirmer mon inscription !">
            <a href="/index.php?c=home" id="back">Retour à l'acceuil</a>
        </div>
    </form>
</div>
</body>
</html>
