<?php

namespace App\Routing;

abstract class AbstractRouter
{
    /**
     * @param string|null $action
     * @return mixed
     */
    abstract public static function route(?string $action = null);
}
