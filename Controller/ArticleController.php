<?php

namespace App\Controller;

use App\Model\Entity\Article;
use App\Model\Manager\ArticleManager;
use MongoDB\BSON\Timestamp;

class ArticleController extends AbstractController
{

    public function index()
    {
        $this->render('article/show-article');
    }

    public function addArticle()
    {
        self::redirectIfNotConnected();

        if ($this->isFormSubmitted()) {
            $user = $_SESSION['user'];
            $title = $this->sanitizeString($this->getField('title'));
            $content = $this->sanitizeString($this->getField('content'));

            $article = new Article();
            $article
                ->setTitle($title)
                ->setContent($content)
                ->setAuthor($user)
            ;

            if (ArticleManager::addNewArticle($article)) {
                $this->render('article/show-article', [
                    'article' => $article
                ]);
            }
        }
        $this->render('article/add-article');
    }
}