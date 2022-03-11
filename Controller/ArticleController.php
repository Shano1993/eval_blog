<?php

namespace App\Controller;

use App\Model\Entity\Article;
use MongoDB\BSON\Timestamp;

class ArticleController extends AbstractController
{

    public function index()
    {
        // TODO: Implement index() method.
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
                ->setDateAdd()
                ->setDateUpdate()
                ->setAuthor($user)
            ;
        }
    }
}