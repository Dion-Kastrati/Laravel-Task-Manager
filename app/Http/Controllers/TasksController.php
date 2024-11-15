<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        Gate::authorize('delete', $task);
        if($task->delete()){
            return redirect()->route('tasks')->with('success', "Tasku u fshi me sukses!");
        }
        return redirect()->route('tasks')->with('error', 'Gabim gjate fshirjes se taskut!');

    }

    public function showEditTaskForm(Task $task){
        Gate::authorize('update', $task);
        return view("editTask", ['task' => $task]);
    }

    public function saveUpdatedFields(Request $request, Task $task){
        // Authorize the action
        Gate::authorize('view', $task);

        // Validate the incoming fields
        $incomingFields = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'priority' => ['required', 'integer'],
        ]);

        // Security measure
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);

        $incomingFields['status'] = $request->has('status') ? 1 : 0;

        if($task->update($incomingFields)){
            return redirect()->route('tasks')->with('success', 'Tasku u perdistua me sukses!');
        }
        return redirect()->route('tasks')->with('error', 'Gabim gjate perditsimit!');
        
    }


    public function filterTasks(Request $request){
        // Get the logged-in user
        $user = Auth::user();

        // Retrieve filters from the request
        $status = $request->input('status'); // Optional
        $priority = $request->input('priority'); // Optional

        // Filter tasks for the logged-in user
        $tasks = Task::query()
            ->where('user_id', $user->id) // Ensure only the user's tasks are retrieved
            ->when($status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->when($priority, function ($query, $priority) {
                $query->where('priority', $priority);
            })
            ->get();

        // Return the filtered tasks
        return view('tasks', compact('tasks'));
    }

}
