<x-main-layout>
    {{-- Default blocks --}}
    <x-slot name="title">{!! $title !!}</x-slot>
    <x-slot name="description">{!! $description !!}</x-slot>
    {{-- Page Content --}}
    <h1 class="p-24 text-2xl text-gray-700 mb-2 text-center">{!! $title !!}</h1>
</x-main-layout>
