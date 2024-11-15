<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    function addNewTask(Request $request){
        $incomingFields = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'priority' => ['required']
        ]);
        //Security measure
        $incomingFields['user_id'] = Auth::id();
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        Task::create($incomingFields);
        return redirect()->route('tasks');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks');
    }

    public function showEditTaskForm(){
        return redirect()->route('editTask');
    }
}
