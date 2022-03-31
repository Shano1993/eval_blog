<?php

namespace App\Controller;

use App\Model\Entity\Article;
use App\Model\Entity\Comment;
use App\Model\Manager\ArticleManager;
use App\Model\Manager\CommentManager;
use MongoDB\BSON\Timestamp;

class ArticleController extends AbstractController
{

    public function index()
    {
        $this->render('article/show-article', [
            'show_article' => ArticleManager::getAll()
        ]);
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
                $this->render('home/index', [
                    'article' => $article
                ]);
                exit();
            }
        }
        $this->render('article/add-article');
    }

    public function deleteArticle(int $id)
    {
        if (ArticleManager::articleExist($id)) {
            $article = ArticleManager::getArticle($id);
            $deleted = ArticleManager::deleteArticle($article);
        }
        $this->index();
    }

    public function editArticle(int $id)
    {
        if (ArticleManager::articleExist($id)) {
            $article = ArticleManager::getArticle($id);
            $edit = ArticleManager::editArticle($article);
        }
        $this->index();
    }
}