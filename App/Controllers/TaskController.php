<?php
namespace App\Controllers;
use App\Helpers\Auth;
use App\Models\Task;
use App\Models\User;

class TaskController
{
    public function __construct()
    {
        if (Auth::check()) {
            layout('adminMain');
        } else {
            header("Location: /login");
        }
    }
    public function tasks()
    {
        $tasks = Task::getAll();
        return view("tasks", "Tasks", $tasks);
    }

    public function addtasks()
    {
        $users = User::getAll();
        return view("addtasks", "Add task", $users);
    }

    public function createtasks()
    {

        if (isset($_POST['ok'])) {
            if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
              
                $targetDir = __DIR__ . '/../public/img/'; 
                $fileName = basename($_FILES['img']['name']);
                $targetFilePath = $targetDir . $fileName;
        
                if (move_uploaded_file($_FILES['img']['tmp_name'], $targetFilePath)) {
                    $imgPath = 'public/img/' . $fileName;  
                } else {
                    echo "Faylni yuklashda xatolik yuz berdi!";
                    exit;
                }
            } else {
                $imgPath = null;
            }
        
            $data = [
                'title'       => $_POST['title'],
                'description' => $_POST['description'],
                'img'         => $imgPath,
                'user_id'     => $_POST['user_id']
            ];
        
            if(Task::addTask($data)){
                header("Location: /");
                exit();
            }
        }
        
    }

    public function sendTask(){
        if(isset($_POST['ok']) && !empty($_POST['task_id']) && !empty($_POST['new_status'])){
            $data = [
                'id' => $_POST['task_id'],
                'status' => $_POST['new_status']
            ];

            if(Task::updateStatus($data)){
                header("Location: /userPage");
            }
        }
    }

    public function sendRequestTask()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['task_id']) && !empty($_POST['new_status'])) {
            $data = [
                'id' => $_POST['task_id'],
                'status' => $_POST['new_status']
            ];
    
            if (Task::updateStatus($data)) {
                header("Location: /");
                exit(); 
            } else {
                echo "Taskni yangilashda xato yuz berdi."; 
            }
        } else {
            echo "Barcha maydonlarni to'ldirishingiz kerak.";
        }
    }
    
}

?>