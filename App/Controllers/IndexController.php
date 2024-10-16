<?php

namespace App\Controllers;

use App\Helpers\Auth;
use App\Models\Task;

class IndexController
{

    public function __construct()
    {
        if(Auth::check()){
            layout('adminMain');
        }else{
            header("Location: /login");
        }
    }
    
    public function index()
    {
        return view("index", "Main");
    }
}
