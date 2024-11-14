<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    function addTask(Request $request){
        $tasks = new Tasks();
        $incomingFields = $request->validate([
            'title' => ['required', 'max:20'],
            'description' => ['required'],
            'priority' => []
        ]);
        if($tasks->save($incomingFields)){
            return redirect()->route('tasks');
        }
        else{
            return back()->with("error", "Task was not created!");
        }
    }
}
