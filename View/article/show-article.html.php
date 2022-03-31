<?php

use App\Model\Entity\Article; ?>

<h1>Liste des articles</h1> <?php

foreach ($data['show_article'] as $article) {
    /* @var Article $article */ ?>
        <div class="article">
            <h2><?= $article->getTitle() ?></h2>
            <div>
                <p><?= $article->getContent() ?></p>
            </div>
            <div>
                <span class="author">Publié par : <?= $article->getAuthor()->getLastname() . " " . $article->getAuthor()->getFirstname() ?></span>
            </div>
        </div>
    <?php
}


