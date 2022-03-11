<h1>Connexion</h1>

<div class="box">
    <form action="/index.php?c=user&a=login" method="post">
        <div class="input-container">
            <input type="email" name="email" id="email">
            <label for="email">Adresse Email</label>
        </div>

        <div class="input-container">
            <input type="password" name="password" id="password">
            <label for="password">Mot de passe</label>
        </div>

        <div class="button-container">
            <input type="submit" class="btn" name="save" value="Connexion">
        </div>
    </form>
</div>