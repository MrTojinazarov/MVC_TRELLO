<?php

use App\Controllers\AuthController;
use App\Controllers\IndexController;
use App\Controllers\TaskController;
use App\Controllers\UserController;
use App\Routes\Route;

Route::get("/", [TaskController::class, "tasks"]);
Route::get("/adminpage", [TaskController::class, "tasks"]);
Route::get("/login", [AuthController::class, "loginPage"]);
Route::get("/register", [AuthController::class, "registerPage"]);
 
Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);
Route::get("/logout", [AuthController::class, "logout"]);

Route::get("/users", [UserController::class, "users"]);
Route::get("/confrimUsers", [UserController::class, "confrimUsers"]);
Route::get("/acceptedUsers", [UserController::class, "acceptedUsers"]);
Route::post("/saveUpdatedUser", [UserController::class, "saveUpdatedUser"]);

Route::get("/addtasks", [TaskController::class, "addtasks"]);
Route::post("/addtasks", [TaskController::class, "createtasks"]);

Route::post("/deleteTask", [TaskController::class, "deleteTask"]);
Route::post("/updateUserStatus", [UserController::class, "updateUserStatus"]);
Route::get("/userPage", [IndexController::class, "index"]);
Route::post("/sendTask", [TaskController::class, 'sendTask']);
Route::post("/sendRequestTask", [TaskController::class, "sendRequestTask"]);
?>
