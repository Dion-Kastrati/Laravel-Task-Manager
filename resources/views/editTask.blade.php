<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO List with Laravel</title>
</head>

<body>
    <div class="mt-10 flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <a href="{{ route('tasks') }}"  class="flex float-end text-2xl/9">×</a>
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Shto nje task te ri</h2>
            
        </div>
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/addNewTask" method="POST">
                @csrf
                <div>
                    <label for="title" class="block text-sm/6 font-medium text-gray-900">Titulli</label>
                    <div class="mt-2">
                        <input id="title" name="title" value="{{$task->title}}" type="text" autocomplete="text" class="pt-2 pb-2 pr-2 pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    </div>
                </div>
                <div>
                    <label for="desc" class="block text-sm/6 font-medium text-gray-900">Pershkrimi</label>
                    <div class="mt-2">
                        <textarea name="description" id="description" cols="30" rows="5" class="pt-2 pb-2 pr-2 pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                            {{$task->description}}
                        </textarea>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label class="block text-sm/6 font-medium text-gray-900 ">Prioriteti</label>
                    </div>
                    <div class="mt-2 flex justify-between">
                        <div>
                            <label for="rad_1">Larte</label>
                            <input type="radio" name="priority" id="rad_1" value="1">
                        </div>
                        <div>
                            <label for="rad_1">Mesem</label>
                            <input selected type="radio" name="priority" id="rad_2" value="2">
                        </div>
                        <div>
                            <label for="rad_1">Ulet</label>
                            <input type="radio" name="priority" id="rad_3" value="3">
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Perditso</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>