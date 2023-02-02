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
<x-forms.title title="Edit user"/>
    <form class="flex justify-center" action="{{ route('users.update', $user->id) }}" method="post">
        <div class="">
            @csrf
            @method('PUT')
            <label for="name">Name</label>
            <x-forms.input type="text" id="name" name="name" value="{{$user->name}}"/>
            <label for="email">Email</label>
            <x-forms.input type="text" id="email" name="email" value="{{$user->email}}"/>
            <label for="password">Password</label>
            <x-forms.input type="password" id="password" name="password" value="{{$user->password}}"/>
            <x-forms.button type="submit" id="submit" name="submit" value="submit"/>
        </div>
    </form>
</body>
</html>
