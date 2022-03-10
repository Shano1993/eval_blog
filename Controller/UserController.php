<?php

namespace App\Controller;

use App\Model\Entity\User;
use App\Model\Manager\UserManager;

class UserController extends AbstractController
{
    public function index()
    {
        $this->render('user/users-list', [
            'users_list' => UserManager::getAll()
        ]);
    }

    public function register()
    {
        $this->render('user/register');
    }

    /**
     * @param int $id
     */
    public function deleteUser(int $id)
    {
        if (UserManager::userExist($id)) {
            $user = UserManager::getUser($id);
            $deleted = UserManager::deleteUser($user);
        }
        $this->index();
    }
}
