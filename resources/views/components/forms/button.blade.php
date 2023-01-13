@props([
  'name',
])
<div class="flex justify-center">
    <button class="
        border border-transparent
        shadow-2xl
        focus:outline-none focus:ring-2 focus:ring-black
        bg-white hover:text-white hover:bg-blue-500 w-1/2 h-12 font-bold py-2 px-4 mt-6 rounded-3xl
        transition-colors duration-300 animate-none
    " type="" id="{{ $name }}" name="{{ $name }}" value="">Submit</button>
</div>
