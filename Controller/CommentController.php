<?php

namespace App\Controller;

use App\Model\Manager\ArticleManager;
use App\Model\Manager\CommentManager;

class CommentController extends AbstractController
{
    public function index()
    {
        $this->render('index/home');
    }

    public function addComment(int $id)
    {
        self::redirectIfNotConnected();

        if ($this->isFormSubmitted())
        {
            $userSession = $_SESSION['user'];
            $user = $userSession->getId();
            $content = $this->sanitizeString($this->getField('content'));

            CommentManager::addComment($content, $user, $id);
            header('location: /index.php?c=article');
        }
        $this->render('comment/add-comment', [
            'article' => ArticleManager::getArticle($id)
        ]);
    }

    /**
     * @param int $id
     */
    public function deleteComment(int $id)
    {
        if (CommentManager::commentExist($id)) {
            if (CommentManager::deleteComment($id)) {
                header('location: index.php?c=article');
            }
            else {
                header('location: /index.php?c=home');
            }
        }
        $this->index();
    }
}
