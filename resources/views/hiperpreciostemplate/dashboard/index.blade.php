<x-guest-layout>
    {{-- Default blocks --}}
    <x-slot name="title">{!! $title !!}</x-slot>
    <x-slot name="description">{!! $description !!}</x-slot>
    {{-- Page Content --}}
    <h1 class="text-2xl p-60 text-gray-700 mb-2 text-center uppercase">{!! $title !!}</h1>
</x-guest-layout>
