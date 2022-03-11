<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\Role;
use App\Model\Entity\User;

class RoleManager
{
    public const TABLE = 'role';
    public const ROLE_ADMIN = 'admin';
    public const ROLE_MODERATOR = 'moderator';
    public const ROLE_USER = 'user';

    /**
     * @return array
     */
    public static function getAll(): array
    {
        $roles = [];
        $request = DB::getPDO()->query("SELECT * FROM " . self::TABLE);
        if ($request) {
            foreach ($request->fetchAll() as $roleData) {
                $roles[] = (new Role())
                    ->setId($roleData['id'])
                    ->setRoleName($roleData['role_name'])
                    ;
            }
        }
        return $roles;
    }

    /**
     * @param User $user
     * @return array
     */
    public static function getRolesByUser(User $user): array
    {
        $roles = [];
        $rolesRequest = DB::getPDO()->query("
            SELECT * FROM " . self::TABLE . " WHERE id IN (SELECT role_fk FROM user_role WHERE user_fk = {$user->getId()})
        ");

        if ($rolesRequest) {
            foreach ($rolesRequest->fetchAll() as $roleData) {
                $roles[] = (new Role())
                    ->setId($roleData['id'])
                    ->setRoleName($roleData['role_name'])
                    ;
            }
        }
        return $roles;
    }

    /**
     * @param string $roleName
     * @return Role
     */
    public static function getRoleByName(string $roleName): Role{
        $role = new Role();
        $request = DB::getPDO()->query("SELECT * FROM role WHERE role_name = '".$roleName."'");
        if ($request && $roleData = $request->fetch()) {
            $role->setId($roleData['id']);
            $role->setRoleName($roleData['role_name']);
        }
        return $role;
    }
}
