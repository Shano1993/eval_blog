<?php

namespace App\Routing;

use ErrorController;
use UserController;

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
           case 'register':
               $controller->register();
               break;
           case 'logout':
               $controller->logout();
               break;
           case 'login':
               $controller->login();
               break;
           default:
               (new ErrorController())->error404($action);
       }
    }
}
