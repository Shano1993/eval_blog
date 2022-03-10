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
        if ($this->isFormSubmitted()) {
            $errors = [];
            $firstname = $this->sanitizeString($this->getField('firstname'));
            $lastname = $this->sanitizeString($this->getField('lastname'));
            $password = $this->getField('password');
            $passwordRepeat = $this->getField('password-repeat');
            $email = filter_var($this->getField('email'), FILTER_SANITIZE_EMAIL);
            $age = (int)$this->getField('age', 0);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "L'adresse email n'est pas dans un format correct";
            }
            if (strlen($firstname) <= 2) {
                $errors[] = "Le prénom doit contenir plus de 2 caractères";
            }
            if (strlen($lastname) <= 2) {
                $errors[] = "Le nom doit contenir plus de 2 caractères";
            }
            if ($password !== $passwordRepeat) {
                $errors[] = "Les mots de passe ne correspondent pas";
            }
            if (!preg_match('/^(?=.*[!@#$%^&*-\])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $password)) {
                $errors[] = "Le mot de passe doit contenir une majuscule, un chiffre et un caractère special";
            }
            if ($age <= 12 || $age >= 100) {
                $errors[] = "Vous n'avez pas l'âge recquis pour vous inscrire";
            }
            echo "<pre>";
            var_dump($errors);
            echo "</pre>";
        }
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
