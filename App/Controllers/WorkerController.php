<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\Task;
use App\Helpers\Auth;

class WorkerController
{
    public function __construct()
    {
        if (isset($_SESSION['Auth'])) {
            if ((is_object($_SESSION['Auth']) && $_SESSION['Auth']->role == 'admin')) {
    
                if (Auth::check()) {
                    layout('adminMain');
                } else {
                    header("Location: /login");
                    exit;
                }
    
            } elseif ((is_object($_SESSION['Auth']) && $_SESSION['Auth']->role == 'user')) {
    
                if (Auth::check()) {
                    layout('userMain');
                } else {
                    header("Location: /login");
                    exit;
                }
    
            } else {
                unset($_SESSION['Auth']);
                header("Location: /register");
                exit;
            }
        } else {
            header("Location: /register");
            exit;
        }
    }

    public function worker()
    {
        $id = ($_SESSION['Auth']->id);
        $userTasks = Task::getAllUserTasks($id);
        return view("worker", "Worker", $userTasks);
    }
}



?>