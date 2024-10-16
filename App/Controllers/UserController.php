<?php

namespace App\Controllers;

use App\Helpers\Auth;
use App\Models\User;

class UserController
{
    public function __construct()
    {
        if (Auth::check()) {
            layout('tasksMain');
        } else {
            header("Location: /login");
        }
    }
    public function users()
    {

        $users = User::getAll();

        return view("users", "Users", $users);
    }

    public function saveUpdatedUser()
    {
        if (isset($_POST['ok'])) {
            if (!empty($_POST['id']) && !empty($_POST['role']) && !empty($_POST['status'])) {
                $data = [
                    'id' => $_POST['id'],
                    'role' => $_POST['role'],
                    'status' => $_POST['status']
                ];

                if (User::saveUpdatedUser($data)) {
                    header("Location: /users");
                    exit();
                } else {
                    echo "Yangilashda xato yuz berdi.";
                }
            }
        }
    }

    public function deleteUser()
    {
        if (isset($_POST['ok']) && !empty($_POST['id'])) {
            $id = $_POST['id'];
            if (User::deleteById($id)) {
                header("Location: /users");
                exit();
            } else {
                echo "O'chirishda xato yuz berdi.";
            }
        }
    }
}
