<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\User;

class UserManager
{
    public const TABLE = 'user';

    public static function getAll(): array
    {
        $users = [];
        $request = DB::getPDO()->query("SELECT * FROM " . self::TABLE);

        if ($request) {
            foreach ($request->fetchAll() as $data) {
                $users[] = self::makeUser($data);
            }
        }
        return $users;
    }

    private static function makeUser(array $data): User
    {
        $user = (new User())
            ->setId($data['id'])
            ->setAge($data['age'])
            ->setUsername($data['username'])
            ->setEmail($data['email'])
            ->setPassword($data['password'])
            ;

        return $user->setRoles(RoleManager::getRolesByUser($user));
    }
}
