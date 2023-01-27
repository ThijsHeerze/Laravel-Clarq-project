<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-clip-text text-transparent bg-gradient-to-r from-violet-500 to-green-500">
<x-forms.title title="Create Task"/>
    <form action="{{ route('tasks.store') }}" class="flex justify-center" method="post">
        <div class="">
            @csrf
            <x-forms.label name="user" label="User" for="user"></x-forms.label>
            <select class="border border-transparent focus:outline-none focus:ring-2 focus:ring-black shadow-gray-700 shadow-lg shadow-2xl appearance-none border rounded-3xl w-64 py-2 px-3 mb-4 text-gray-700 focus:outline-none focus:shadow-outline flex justify-center" name="user_id">
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <x-forms.label name="category" label="Category" for="category"></x-forms.label>
            <div class="flex justify-center">
            @foreach($categories as $category)
                <input type="checkbox" id="{{ $category->name }}" name="category_id[]" value="{{ $category->id }}" class="w-10 py-2 px-3 text-black flex justify-center flex-wrap cursor-pointer"/>{{ $category->name }}
            @endforeach
            </div>
            <x-forms.label name="title" label="Title" for="title"></x-forms.label>
            <x-forms.input type="text" name="title" value=""></x-forms.input>
            <x-forms.label name="description" label="Description" for="description"></x-forms.label>
            <x-forms.input type="text" name="description" value=""></x-forms.input>
            <x-forms.label name="deadline" label="Deadline" for="deadline"></x-forms.label>
            <x-forms.input type="date" name="deadline" value=""></x-forms.input>
            <x-forms.button type="submit" id="submit" name="submit" value="submit"></x-forms.button>
        </div>
    </form>
</body>
</html>
