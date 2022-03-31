<?php

use App\Model\Entity\Article; ?>

<h1>Liste des articles</h1> <?php

foreach ($data['show_article'] as $article) {
    /* @var Article $article */ ?>
    <div class="article">
        <span><a class= "edit" href="/index.php?c=article&a=delete-article&id=<?= $article->getId() ?>">Supprimer</a></span>
        <br>
        <span><a class = "edit" href="/index.php?c=article&a=edit-article&id=<?= $article->getId() ?>">Editer</a></span>
        <h2><?= $article->getTitle() ?></h2>
        <div>
            <p><?= $article->getContent() ?></p>
        </div>
        <div>
            <span class="author">Publié par : <?= $article->getAuthor()->getLastname() . " " . $article->getAuthor()->getFirstname() ?></span>
        </div>
        <div>
            <p>Commentaires</p>
            <form action="/index.php?c=article&a=add-comment" method="post">
                <input type="text" name="comment" class="commentary" placeholder="Votre commentaire">
                <input type="submit" class="addCommentary" name="save">
            </form>
        </div>
    </div> <?php
}


