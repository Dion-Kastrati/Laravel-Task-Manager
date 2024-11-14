<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<ul class="bg-white shadow overflow-hidden sm:rounded-md max-w-screen-md mx-auto mt-16">
    <li>
        <div class="px-4 py-5 sm:px-6">
            <div class="flex items-center justify-between">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Titulli i detyres 1</h3> <br>
            </div>
            <div class="mt-4 items-center justify-between">
                <p class=" mt-1 max-w-2xl text-sm text-gray-500">Pershkrimi i detyres 1</p>
                <div class=" block mt-4 mb-4 flex items-center justify-between">
                <p class="text-sm font-medium text-gray-500">Statusi: Perfunduar/Paperfunduar</p>
                <p class="text-sm font-medium text-gray-500">Prioriteti: I larte/Mesem/Ulte</p>
                </div>
                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Edit</a>
            </div>
        </div>
    </li>
    <li class="border-t border-gray-200">
    <div class="px-4 py-5 sm:px-6">
            <div class="flex items-center justify-between">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Titulli i detyres 1</h3> <br>
            </div>
            <div class="mt-4 items-center justify-between">
                <p class=" mt-1 max-w-2xl text-sm text-gray-500">Pershkrimi i detyres 1</p>
                <div class=" block mt-4 mb-4 flex items-center justify-between">
                <p class="text-sm font-medium text-gray-500">Statusi: Perfunduar/Paperfunduar</p>
                <p class="text-sm font-medium text-gray-500">Prioriteti: I larte/Mesem/Ulte</p>
                </div>
                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Edit</a>
            </div>
        </div>
    </li>
    <li class="border-t border-gray-200">
    <div class="px-4 py-5 sm:px-6">
            <div class="flex items-center justify-between">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Titulli i detyres 1</h3> <br>
            </div>
            <div class="mt-4 items-center justify-between">
                <p class=" mt-1 max-w-2xl text-sm text-gray-500">Pershkrimi i detyres 1</p>
                <div class=" block mt-4 mb-4 flex items-center justify-between">
                <p class="text-sm font-medium text-gray-500">Statusi: Perfunduar/Paperfunduar</p>
                <p class="text-sm font-medium text-gray-500">Prioriteti: I larte/Mesem/Ulte</p>
                </div>
                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Edit</a>
            </div>
        </div>
    </li>
</ul>
<div class="bg-white max-w-screen-md mx-auto mt-16">
    <a href="{{ route('addNewTask') }}" class=" float-end bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">New Task</a>
</div>

<script src="https://cdn.tailwindcss.com"></script>
</body>
</html>