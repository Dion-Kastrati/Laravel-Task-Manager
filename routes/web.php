<?php

use App\Http\Controllers\DefaultController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('login');
});

Route::get('/login', [DefaultController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'loginPost'])->name('login');


Route::get('/register', [DefaultController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'registerPost'])->name('register');

Route::get("/tasks", [DefaultController::class, 'showTasksGet'])->name('tasks');
Route::post('/tasks', [TasksController::class, 'addTask'])->name('tasks');

Route::get('/addNewTask', [DefaultController::class, 'addNewTaskGet'])->name('addNewTask');