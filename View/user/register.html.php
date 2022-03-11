<h1>Formulaire d'inscription</h1>

    <div class="box">
        <form action="/index.php?c=user&a=register" method="post">
            <div class="input-container">
                <input type="text" name="firstname" id="firstname">
                <label for="firstname">Votre prénom</label>
            </div>

            <div class="input-container">
                <input type="text" name="lastname" id="lastname">
                <label for="lastname">Votre nom</label>
            </div>

            <div class="input-container">
                <input type="password" name="password" id="password">
                <label for="password">Mot de passe</label>
            </div>

            <div class="input-container">
                <input type="password" name="password-repeat" id="passwordRepeat">
                <label for="passwordRepeat">Répéter le mot de passe</label>
            </div>

            <div class="input-container">
                <input type="email" name="email" id="email">
                <label for="email">Adresse Email</label>
            </div>

            <div class="input-container">
                <input type="number" name="age" id="age">
                <label for="age">Votre âge</label>
            </div>

            <div class="button-container">
                <input type="submit" class="btn" name="save" value="Confirmer mon inscription !">
                <a href="/index.php?c=home" id="back">Retour à l'acceuil</a>
            </div>
        </form>
    </div>
