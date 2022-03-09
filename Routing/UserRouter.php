<?php

namespace App\Routing;

use App\Controller\UserController;
use ErrorController;

class UserRouter extends AbstractRouter
{

    public static function route(?string $action = null)
    {
       $controller = new UserController();
       switch ($action) {
           case 'index':
               $controller->index();
               break;
           case 'delete-user':
               self::routeWithParams($controller, 'deleteUser', ['id' => 'int']);
               break;
           default:
               (new ErrorController())->error404($action);
       }
    }
}
