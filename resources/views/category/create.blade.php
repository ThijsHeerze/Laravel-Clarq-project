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
<x-forms.title title="Create Category"/>
<form action="{{ route('category.store') }}" class="flex justify-center" method="post">
    <div class="">
        @csrf
{{--        <x-forms.label class="text-lg font-semibold mb-4 " name="user" label="User" for="user">User</x-forms.label>--}}
{{--        <select class="border border-transparent--}}
{{--    focus:outline-none focus:ring-2 focus:ring-black--}}
{{--    shadow-gray-700 shadow-lg shadow-2xl--}}
{{--    appearance-none--}}
{{--    border flex--}}
{{--    rounded-3xl--}}
{{--    w-64 py-2 px-3 mb-4--}}
{{--    text-gray-700--}}
{{--    focus:outline-none focus:shadow-outline flex justify-center" name="user_id">--}}
{{--            @foreach($categories as $category)--}}
{{--                <option value="{{ $category->id }}">{{ $category->name }}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
        <x-forms.label name="name" label="Name" for="name"></x-forms.label>
        <x-forms.input type="text" name="name" value=""></x-forms.input>
        <x-forms.button type="submit" id="submit" name="submit" value="submit"></x-forms.button>
    </div>
</form>
</body>
</html>
