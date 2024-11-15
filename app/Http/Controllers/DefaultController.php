<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function showLoginForm(){
        return view("login");
    }

    public function showRegisterForm(){
        return view("register");
    }

    function showTasksGet(){
        $tasks = Task::where('user_id', Auth::id())->latest()->get();
        return view('tasks', ['tasks' => $tasks]);
     }

    function addNewTaskGet(){
        return view('addNewTask');
    }
}