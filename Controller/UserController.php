<?php

use App\Controller\AbstractController;
use App\Model\Entity\User;
use App\Model\Manager\RoleManager;
use App\Model\Manager\UserManager;

class UserController extends AbstractController
{
    public function index()
    {
        $this->render('user/users-list', [
            'users_list' => UserManager::getAll()
        ]);
    }

    /**
     *
     */
    public function register()
    {
        self::redirectIfConnected();

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

            if (count($errors) > 0) {
                $_SESSION['errors'] = $errors;
            } else {
                $user = new User();
                $role = RoleManager::getRoleByName('user');
                $user
                    ->setFirstname($firstname)
                    ->setLastname($lastname)
                    ->setEmail($email)
                    ->setPassword(password_hash($password, PASSWORD_DEFAULT))
                    ->setAge($age)
                    ->setRoles([$role]);

                if (!UserManager::mailUserExist($user->getEmail())) {
                    UserManager::addUser($user);
                    if (null !== $user->getId()) {
                        $_SESSION['success'] = "Inscription réussie, votre compte est actif";
                        $user->setPassword('');
                        $_SESSION['user'] = $user;
                    } else {
                        $_SESSION['errors'] = "Impossible de vous enregistrer";
                    }
                }
                else {
                    $_SESSION['errors'] = "L'adresse email est déjà utilisée !";
                }
            }
        }
        $this->render('user/register');
        exit();
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

    public function logout(): void
    {
        if (self::userConnected()) {
            $_SESSION['user']  = null;
            $_SESSION['errors'] = null;
            $_SESSION['success'] = null;
            session_destroy();
        }
        $this->render('home/index');
    }

    public function login()
    {
        if ($this->isFormSubmitted()) {
            $errorMessage = "L'adresse email ou le mot de passe est incorrect";
            $email = $this->sanitizeString($this->getField('email'));
            $password = $this->getField('password');

            $user = UserManager::getUserByMail($email);
            if (null === $user) {
                $_SESSION['errors'][] = $errorMessage;
            }
            else {
                if (password_verify($password, $user->getPassword())) {
                    $user->setPassword('');
                    $_SESSION['user'] = $user;
                    $this->redirectIfConnected();
                }
                else {
                    $_SESSION['errors'][] = $errorMessage;
                }
            }
        }
        else {
            $this->render('user/login');
        }
    }

    public function profil()
    {
        $this->render('user/profil');
    }
}
