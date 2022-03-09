<?php

namespace App\Model\Manager;

use App\Model\DB;

class FormManager
{
    public static function addUser()
    {
        $request = DB::getPDO()->prepare("INSERT INTO user (firstname, lastname, email, password, age) 
                                                    VALUES (:firstname, :lastname, :email, :password, :age)
                                        ");
        $request->execute([
            ':email' => $_POST['mail'],
            ':firstname' => $_POST['firstname'],
            ':lastname' => $_POST['lastname'],
            ':password' => $_POST['password'],
            ':age' => $_POST['age'],
        ]);
    }
}
