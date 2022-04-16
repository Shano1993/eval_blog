<h1>Connexion</h1>

<form action="/index.php?c=user&a=login" method="post" class="formRegister">
    <div class="input-container">
        <input type="email" name="email" id="email" placeholder="Votre adresse email" required maxlength="150" minlength="6">
    </div>

    <div class="input-container">
        <input type="password" name="password" id="password" placeholder="Votre mot de passe" required maxlength="255" minlength="6">
    </div>

    <div class="button-container">
        <input type="submit" class="btn" name="save" value="Connexion">
        </div>
</form>
