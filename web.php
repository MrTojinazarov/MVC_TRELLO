<?php

use App\Controllers\AuthController;
use App\Controllers\IndexController;
use App\Controllers\TaskController;
use App\Controllers\UserController;
use App\Routes\Route;

Route::get("/", [IndexController::class, "index"]);
Route::get("/login", [AuthController::class, "loginPage"]);
Route::get("/register", [AuthController::class, "registerPage"]);

Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);
Route::get("/logout", [AuthController::class, "logout"]);

Route::get("/tasks", [TaskController::class, "tasks"]);
Route::get("/users", [UserController::class, "users"]);
Route::post("/saveUpdatedUser", [UserController::class, "saveUpdatedUser"]);
Route::post("/deleteUser", [UserController::class, "deleteUser"]);

Route::get("/addtasks", [TaskController::class, "addtasks"]);
Route::post("/addtasks", [TaskController::class, "createtasks"]);

Route::post("/deleteTask", [TaskController::class, "deleteTask"]);

?>