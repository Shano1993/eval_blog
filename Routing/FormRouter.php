<?php

namespace App\Routing;

use FormController;

class FormRouter extends AbstractRouter
{
    /**
     * @param string|null $action
     * @return void
     */
    public static function route(?string $action = null)
    {
        $controller = new FormController();
        switch ($action) {
            case 'index':
                $controller->index();
                break;
            case 'confirm-register':
                $controller->confirmRegister();
                break;
        }
    }
}
