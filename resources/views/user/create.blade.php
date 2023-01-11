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
<x-forms.title title="Create User"/>
    <form action="{{ route('users.store') }}" class="flex justify-center" method="post">
        <div class="">
            @csrf
            <x-forms.label name="name" label="Name" for="name"></x-forms.label>
            <x-forms.input type="text" name="name" value=""></x-forms.input>
            <x-forms.label name="email" label="Email" for="email"></x-forms.label>
            <x-forms.input type="text" name="email" value=""></x-forms.input>
            <x-forms.label name="password" label="Password" for="password"></x-forms.label>
            <x-forms.input type="password" name="password" value=""></x-forms.input>
            <x-forms.button type="submit" id="submit" name="submit" value="submit"></x-forms.button>
        </div>
    </form>
</body>
</html>
