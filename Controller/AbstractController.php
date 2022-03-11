<?php

namespace App\Controller;

abstract class AbstractController
{
    abstract public function index();

    public function render(string $temp, array $data = [])
    {
        ob_start();
        require __DIR__ . '/../View/' . $temp . '.html.php';
        $html = ob_get_clean();
        require __DIR__ . '/../View/base.html.php';
    }

    /**
     * @param string $field
     * @param null $default
     * @return mixed|string&
     */
    public function getField(string $field, $default = null)
    {
        if (!isset($_POST[$field])) {
            return (null === $default) ? '' : $default;
        }
        return $_POST[$field];
    }

    /**
     * @return bool
     */
    public function isFormSubmitted(): bool
    {
        return isset($_POST['save']);
    }

    /**
     * @return bool
     */
    public static function userConnected(): bool
    {
        return isset($_SESSION['user']) && null !== ($_SESSION['user'])->getId();
    }

    /**
     *
     */
    public function redirectIfConnected(): void
    {
        if (self::userConnected()) {
            $this->render('home/index');
        }
    }

    /**
     *
     */
    public function redirectIfNotConnected(): void
    {
        if (!self::userConnected()) {
            $this->render('home/index');
        }
    }

    /**
     * @param string $param
     * @return string
     */
    public function sanitizeString(string $param): string
    {
        return filter_var($param, FILTER_SANITIZE_STRING);
    }
}