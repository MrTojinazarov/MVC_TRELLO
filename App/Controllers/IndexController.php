<?php
namespace App\Controllers;

use App\Helpers\Auth;
use App\Models\User;

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
        return view("index", "My page");
    }
}

?>