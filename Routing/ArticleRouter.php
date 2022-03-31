<?php

namespace App\Routing;

use App\Controller\ArticleController;
use ErrorController;

class ArticleRouter extends AbstractRouter
{
    public static function route(?string $action = null)
    {
        $controller = new ArticleController();
        switch ($action) {
            case 'index':
                $controller->index();
                break;
            case 'add-article':
                $controller->addArticle();
                break;
            default:
                (new ErrorController())->error404($action);
        }
    }
}

