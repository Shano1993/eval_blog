<?php

namespace App\Controller;

use App\Model\Manager\UserManager;

class UserController extends AbstractController
{
    public function index()
    {
        $this->render('user/users-list', [
            'users_list' => UserManager::getAll()
        ]);
    }

    public function deleteUser(int $id)
    {
        if (UserManager::userExist($id)) {
            $user = UserManager::getUser($id);
            $deleted = UserManager::deleteUser($user);
        }
        $this->index();
    }
}
