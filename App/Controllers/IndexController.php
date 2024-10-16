<?php
namespace App\Controllers;

use App\Helpers\Auth;
use App\Models\Task;

class IndexController
{
    public function __construct()
    {
        if(Auth::check()){
            layout('usersMain');
        }else{
            header("Location: /login");
        }
    }

    public function index()
    {
        $id = Auth::user()->id;
        $MyTasks = Task::getAllMyTasks($id);
        // dd($MyTasks);
        return view("index", "My page", $MyTasks);
    }
}

?>