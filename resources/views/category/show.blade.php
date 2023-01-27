<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-500 to-sky-500">
    <x-forms.title title="Show tasks"/>
        <div class="flex justify-end">
            <a href="{{ route('tasks.index') }}" class="w-16 h-10 text-white bg-blue-600 hover:bg-blue-700 mb-4 mr-12 p-2 flex justify-center rounded duration-300 animate-none" type="submit" class="cursor-pointer" value="">Tasks</a>
            <a href="{{ route('users.index') }}" class="w-16 h-10 text-white bg-blue-600 hover:bg-blue-700 mb-4 mr-12 p-2 flex justify-center rounded duration-300 animate-none" type="submit" class="cursor-pointer" value="">Users</a>
            <a href="{{ route('categories.index') }}" class="w-24 h-10 text-white bg-blue-600 hover:bg-blue-700 mb-4 mr-12 p-2 flex justify-center rounded duration-300 animate-none" type="submit" class="cursor-pointer" value="">Categories</a>
            <a href="{{ route('login.index') }}" class="w-16 h-10 text-white bg-blue-600 hover:bg-blue-700 mb-4 mr-12 p-2 flex justify-center rounded duration-300 animate-none" type="submit" class="cursor-pointer" value="">Login</a>
        </div>
    <hr class="mb-5">
    <table class="flex justify-center">
        <tr class="bg-gray-300 bg-opacity-40 max-w-md">
            <th class="">User</th>
            <th class="">Category</th>
            <th class="">Title</th>
            <th class="">Description</th>
            <th class="">Deadline</th>
        </tr>
        @foreach($category->tasks as $task)
            <tr class="bg-gray-200 bg-opacity-5">
                <td class="">{{$task->user->name}}</td>
                @foreach($task->categories as $category)
                    <td class="">{{$category->name}}</td>
                @endforeach
                <td class="">{{$task->title}}</td>
                <td class="">{{$task->description}}</td>
                <td class="">{{$task->deadline}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
