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
        $cfUsersCount = User::confrimUsersCount();
        $AcptUsersCount = User::AccUsersCount();
        return view("users", "Users", ['models' => $users, 'cnfCount' => $cfUsersCount, 'acptCount' => $AcptUsersCount]);
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
    public function confrimUsers()
    {
        $users = User::getAll();
        $UsersCount = User::UsersCount();
        $AcptUsersCount = User::AccUsersCount();
        return view("confrimUsers", "Confrim", ['models' => $users, 'count' => $UsersCount, 'acptCount' => $AcptUsersCount]);
    }

    public function acceptedUsers()
    {
        $users = User::getAll();
        $UsersCount = User::UsersCount();
        $cfUsersCount = User::confrimUsersCount();
        return view("acceptedUsers", "Accepted", ['models' => $users, 'count' => $UsersCount, 'cnfCount' => $cfUsersCount]);
    }

    public function updateUserStatus()
    {
        if(isset($_POST['ok']) && (!empty($_POST['status']) || $_POST['status'] == 0) && !empty($_POST['id'])){
            $data = [
                'id' => $_POST['id'],
                'status' => $_POST['status'] 
            ];
            $update = User::updateStatus($data);
            if($update){
                header("Location: /users");
                exit();
            }
        }
    }
}
