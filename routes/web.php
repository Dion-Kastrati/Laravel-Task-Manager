<?php

use App\Http\Controllers\DefaultController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TasksController;
use GuzzleHttp\Promise\TaskQueue;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('login');
});

// Login routes
Route::get('/login', [DefaultController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'loginPost'])->name('login');

// Register routes
Route::get('/register', [DefaultController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'registerPost'])->name('register');

//Logout routes
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Task related routes
Route::get("/tasks", [DefaultController::class, 'showTasksGet'])->name('tasks');
Route::get('/addNewTask', [DefaultController::class, 'addNewTaskGet'])->name('addNewTask');
Route::post('/addNewTask', [TasksController::class, 'addNewTask'])->name('addNewTask');
Route::delete('/destroy/{task}', [TasksController::class, "destroy"])->name('destroy');
Route::get("/editTask/{{post}}",[TasksController::class, "showEditTaskForm"])->name('editTask');