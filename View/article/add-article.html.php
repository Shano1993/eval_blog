<h1>Ajouter un article</h1>

<form action="/index.php?c=article&a=add-article" method="post" class="formRegister">
    <div>
        <input type="text" name="title" id="article-title" placeholder="Titre de l'article" required maxlength="255" minlength="5">
    </div>
    <div>
        <textarea name="content" id="article-content" cols="100" rows="20" placeholder="Votre texte ici" required maxlength="500" minlength="10"></textarea>
    </div>

    <input type="submit" id="add-article" value="Enregistrer" name="save">
</form>

