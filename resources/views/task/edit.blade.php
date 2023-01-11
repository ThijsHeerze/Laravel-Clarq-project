<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-clip-text text-transparent bg-gradient-to-r from-violet-500 to-orange-500">
<x-forms.title title="Edit task"/>
    <form class="flex justify-center" action="{{ route('tasks.update', $task->id) }}" method="post">
        <div class="">
            @csrf
            @method('PUT')
            <label for="title">Title</label>
            <x-forms.input type="text" id="title" name="title" value="{{$task->title}}"/>
            <label for="description">Description</label>
            <x-forms.input type="text" id="description" name="description" value="{{$task->description}}"/>
            <label for="deadline">Deadline</label>
            <x-forms.input type="date" id="deadline" name="deadline" value="{{$task->deadline}}"/>
            <x-forms.button type="submit" id="submit" name="submit" value="submit"/>
        </div>
    </form>
</body>
</html>
