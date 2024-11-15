<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DefaultController extends Controller
{
    public function showLoginForm(){
        return view("login");
    }

    public function showRegisterForm(){
        return view("register");
    }

    function showTasksGet(Task $task){
        Gate::authorize('view', $task);
        $tasks = Task::where('user_id', Auth::id())->latest()->get();
        return view('tasks', ['tasks' => $tasks]);
     }

    function addNewTaskGet(Task $task){
        Gate::authorize('create', $task);
        return view('addNewTask');
    }
}