<h1>Formulaire d'inscription</h1>

    <form action="/index.php?c=user&a=register" method="post" class="formRegister">
        <div class="input-container">
            <input type="text" name="firstname" id="firstname" placeholder="Votre prénom">
        </div>

        <div class="input-container">
            <input type="text" name="lastname" id="lastname" placeholder="Votre nom">
        </div>

        <div class="input-container">
            <input type="password" name="password" id="password" placeholder="Votre mot de passe">
        </div>

        <div class="input-container">
            <input type="password" name="password-repeat" id="passwordRepeat" placeholder="Répéter le mot de passe">
        </div>

        <div class="input-container">
            <input type="email" name="email" id="email" placeholder="Votre adresse email">
        </div>

        <div class="input-container">
            <input type="number" name="age" id="age" placeholder="Votre âge">
        </div>

        <div class="button-container">
            <div>
                <input type="submit" class="btn" name="save" value="Confirmer mon inscription !">
            </div>
            <div class="back">
                <a href="/index.php?c=home" id="back">Retour à l'acceuil</a>
            </div>
        </div>
    </form>
