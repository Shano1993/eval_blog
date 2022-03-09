<?php

use App\Routing\AbstractRouter;
use App\Routing\FormRouter;
use App\Routing\HomeRouter;
use App\Routing\UserRouter;

require __DIR__ . '/../includes.php';

$page = isset($_GET['c']) ? AbstractRouter::secured($_GET['c']) : 'home';
$method = isset($_GET['a']) ? AbstractRouter::secured($_GET['a']) : 'index';

switch ($page) {
    case 'home':
        HomeRouter::route();
        break;
    case 'user':
        UserRouter::route($method);
        break;
    case 'form':
        FormRouter::route($method);
        break;
    default:
        (new ErrorController())->error404($page);
}