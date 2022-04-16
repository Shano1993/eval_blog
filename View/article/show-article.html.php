<?php

use App\Controller\AbstractController;
use App\Model\Entity\Article;
use App\Model\Manager\CommentManager; ?>

<h1>Liste des articles</h1> <?php

foreach ($data['show_article'] as $article) {
    /* @var Article $article */ ?>
    <div class="article"> <?php
        if (UserController::adminConnected()) { ?>
            <span><a class= "edit" href="/index.php?c=article&a=delete-article&id=<?= $article->getId() ?>">Supprimer</a></span>
            <br>
            <span><a class = "edit" href="/index.php?c=article&a=edit-article&id=<?= $article->getId() ?>">Editer</a></span> <?php
        } ?>

        <h2><?= $article->getTitle() ?></h2>
        <div>
            <p><?= $article->getContent() ?></p>
        </div>
        <div>
            <span class="author">Publié par : <?= $article->getAuthor()->getLastname() . " " . $article->getAuthor()->getFirstname() ?></span>
        </div>
        <div class="comment">
            <p>Commentaires : </p>
            <a class="addCommentary" href="/index.php?c=comment&a=add-comment&id=<?= $article->getId() ?>">Ajouter un commentaire</a>
            <?php
            foreach (CommentManager::getCommentByArticle($article) as $value) { ?>
                    <div class="comments">
                        <p class="commentary"><?= $value->getContent() ?></p>
                        <p class="author"><?= $value->getAuthor()->getFirstname() ?></p>
                    </div> <?php
                if (AbstractController::adminConnected()) { ?>
                    <a href="/index.php?c=comment&a=delete-comment&id=<?= $value->getId() ?>">Supprimer</a> <?php
                }
            } ?>
        </div>
    </div> <?php
}


