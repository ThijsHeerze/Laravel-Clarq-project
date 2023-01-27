<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-clip-text text-transparent bg-gradient-to-r from-sky-500 to-red-500">
<x-forms.title title="Edit task"/>
<form class="flex justify-center" action="{{ route('categories.update', $category->id) }}" method="post">
    <div class="">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <x-forms.input type="text" id="name" name="name" value="{{$category->name}}"/>
        <x-forms.button type="submit" id="submit" name="submit" value="submit"/>
    </div>
</form>
</body>
</html>
