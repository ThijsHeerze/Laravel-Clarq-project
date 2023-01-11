@props([
  'name', 'type', 'value'
])
<div>
    <input class="
    border border-transparent
    focus:outline-none focus:ring-2 focus:ring-black
    shadow-gray-700 shadow-lg shadow-2xl
    appearance-none
    border flex
    rounded-3xl
    w-64 py-2 px-3 mb-4
    text-gray-700
    focus:outline-none
    focus:shadow-outline
    flex justify-center"
    type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}"/>
</div>
