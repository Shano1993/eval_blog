<?php

use App\Controller\AbstractController;
use App\Model\Manager\FormManager;

class FormController extends AbstractController
{
    public function index()
    {
        $this->render('form/form');
    }

    public function confirmRegister()
    {
        FormManager::addUser();
    }
}
