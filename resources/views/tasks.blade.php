<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a class="flex items-center space-x-3 rtl:space-x-reverse">
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">TODO List</span>
    </a>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
            <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Logout</button>
            </form>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="bg-white max-w-screen-md mx-auto mt-16">
    <a href="{{ route('addNewTask') }}" class=" float-end bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">New Task</a>
</div>
<br>
@foreach($tasks as $task)
<ul class="bg-white shadow overflow-hidden sm:rounded-md max-w-screen-md mx-auto mt-8">


    <li>
        <div class="px-4 py-5 sm:px-6">
            <div class="flex items-center justify-between">
                <h3 class="text-lg leading-6 font-medium text-gray-900">{{$task['title']}}</h3> <br>
            </div>
            <div class="mt-4 items-center justify-between">
                <p class=" mt-1 max-w-2xl text-sm text-gray-500">{{$task['description']}}</p>
                <div class=" block mt-4 mb-4 flex items-center justify-between">
                <p class="text-sm font-medium text-gray-500">Statusi: {{ $task['status'] == 0 ? "Jo e perfunduar" : "Perfunduar"}}</p>
                @if($task->priority == 1)
                    <p class="text-sm font-medium text-gray-500">Prioriteti: I Larte</p>
                @elseif($task->priority == 2)
                    <p class="text-sm font-medium text-gray-500">Prioriteti: I Mesem</p>
                @elseif($task->priority == 3)
                    <p class="text-sm font-medium text-gray-500">Prioriteti: I Ulet</p>
                @else
                    <p class="text-sm font-medium text-gray-500">Prioriteti: Task pa prioritet</p>
                @endif
                </div>
                <div class="flex justify-between">
                    <a href="/editTask/{{$task->id}}" class="font-medium text-indigo-600 hover:text-indigo-500">Edit</a>
                    <form action="{{ route('destroy', $task->id) }}" method="POST" style="margin-left: 20px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-red-500 hover:text-indigo-500">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </li>
</ul>
@endforeach

<script src="https://cdn.tailwindcss.com"></script>
</body>
</html>