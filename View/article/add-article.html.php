<h1>Ajouter un article</h1>

<form action="/index.php?c=article&a=add-article" method="post">
    <div>
        <input type="text" name="title" id="article-title" placeholder="Titre de l'article">
    </div>
    <div>
        <textarea name="content" id="article-content" cols="30" rows="20" placeholder="Votre texte ici"></textarea>
    </div>

    <input type="submit" id="add-article" value="Enregistrer" name="save">
</form>

