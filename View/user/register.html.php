<h1>Formulaire d'inscription</h1>

    <form name="form" action="/index.php?c=user&a=register" method="post" class="formRegister">
        <div class="input-container">
            <input type="text" name="firstname" id="firstname" placeholder="Votre prénom" required>
        </div>

        <div class="input-container">
            <input type="text" name="lastname" id="lastname" placeholder="Votre nom" required>
        </div>

        <div class="input-container">
            <input type="password" name="password" id="password" placeholder="Votre mot de passe" required maxlength="255" minlength="6">
        </div>

        <div class="input-container">
            <input type="password" name="password-repeat" id="passwordRepeat" placeholder="Répéter le mot de passe" required maxlength="255" minlength="6">
        </div>

        <div class="input-container">
            <input type="email" name="email" id="email" placeholder="Votre adresse email" required maxlength="150" minlength="6">
        </div>

        <div class="input-container">
            <input type="number" name="age" id="age" placeholder="Votre âge" required>
        </div>

        <div class="button-container">
            <div>
                <input type="submit" id="submit" class="btn" name="save" value="Confirmer mon inscription !">
            </div>
            <div class="back">
                <a href="/index.php?c=home" id="back">Retour à l'acceuil</a>
            </div>
        </div>
    </form>
