<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\User;

class UserManager
{
    public const TABLE = 'user';
    public const TABLE_USER_ROLE = 'user_role';

    /**
     * @return array
     */
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

    /**
     * @param array $data
     * @return User
     */
    private static function makeUser(array $data): User
    {
        $user = (new User())
            ->setId($data['id'])
            ->setFirstname($data['firstname'])
            ->setLastname($data['lastname'])
            ->setEmail($data['email'])
            ->setPassword($data['password'])
            ->setAge($data['age'])
            ;

        return $user->setRoles(RoleManager::getRolesByUser($user));
    }

    /**
     * @param int $id
     * @return User|null
     */
    public static function getUser(int $id): ?User
    {
        $request = DB::getPDO()->query("SELECT * FROM " . self::TABLE . " WHERE id = $id");
        return $request ? self::makeUser($request->fetch()) : null;
    }

    /**
     * @param int $id
     * @return bool
     */
    public static function userExist(int $id): bool
    {
        $result = DB::getPDO()->query("SELECT count(*) as cnt FROM " . self::TABLE . " WHERE id = $id");
        return $result ? $result->fetch()['cnt'] : 0;
    }

    /**
     * @param string $email
     * @return bool
     */
    public static function mailUserExist(string $email): bool
    {
        $result = DB::getPDO()->query("SELECT count(*) as cnt FROM " . self::TABLE . " WHERE email = '".$email."'");
        return $result ? $result->fetch()['cnt'] : 0;
    }

    /**
     * @param User $user
     * @return bool
     */
    public static function deleteUser(User $user): bool
    {
        if (self::userExist($user->getId())) {
            return DB::getPDO()->exec("DELETE FROM " . self::TABLE . " WHERE id = {$user->getId()}");
        }
        return false;
    }

    /**
     * @param User $user
     * @return bool
     */
    public static function addUser(User &$user): bool
    {
        $stmt = DB::getPDO()->prepare("
            INSERT INTO user (firstname, lastname, email, password, age) 
            VALUES (:firstname, :lastname, :email, :password, :age)
        ");

        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':age', $user->getAge());

        $result = $stmt->execute();
        $user->setId(DB::getPDO()->lastInsertId());
        if ($result) {
            $role = RoleManager::getRoleByName(RoleManager::ROLE_USER);
            $resultRole = DB::getPDO()->exec("
                INSERT INTO " . self::TABLE_USER_ROLE . " (user_fk, role_fk)
                VALUES (".$user->getId().", ".$role->getId().")
            ");
        }
        return $result && $resultRole;
    }

    /**
     * @param string $email
     * @return User|null
     */
    public static function getUserByMail(string $email): ?User
    {
        $stmt = DB::getPDO()->prepare("SELECT * FROM " . self::TABLE . " WHERE email = :email LIMIT 1");
        $stmt->bindParam(':email', $email);
        return $stmt->execute() ? self::makeUser($stmt->fetch()) : null;
    }
}
