<?php
namespace App\Controllers;
use App\Models\User;
use App\Helpers\Auth;

class AuthController
{

    public function __construct()
    {
        layout('loginMain');
    }

    public function loginPage()
    {
        return view("login", "Login");
    }

    public function registerPage()
    {
        return view("register", "Registration");
    }

    public function login()
    {
        if(isset($_POST['ok'])){
            if(!empty($_POST['email']) && !empty($_POST['password'])){

                $data = [
                    'email' => $_POST['email'],
                    'password' => $_POST['password']
                ];

                $user = User::getUserByLogin($data);
                if($user){
                    $_SESSION['Auth'] = $user;
                    if(Auth::check()){
                        if(Auth::user()->role == 'admin'){
                            header("Location: /");
                        }elseif(Auth::user()->role == 'user'){
                            header("Location: /userPage");
                        }
                    }else{
                        header("Location: /login");
                    }
                    exit();
                }else{
                    header("Location: /login");
                    exit();
                }
            }
        }
    }

    public function register()
    {
        if(isset($_POST['ok'])){
            if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])){

                $data = [
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password']
                ];

                $userExists = User::CheckUserExists($data);
                if($userExists){
                    header("Location: /register");
                    exit();
                }else{
                    $_SESSION['Auth'] = User::createUser($data);
                    header("Location: /");
                    exit();
                }
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['Auth']);
        header("Location: /login");
        exit();
    }
}
?>