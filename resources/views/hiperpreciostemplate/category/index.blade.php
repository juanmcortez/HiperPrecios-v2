<x-main-layout>
    {{-- Default blocks --}}
    <x-slot name="title">{!! $title !!}</x-slot>
    <x-slot name="description">{!! $description !!}</x-slot>
    {{-- Page Title --}}
    <h1 class="py-4 px-6 text-xl font-bold text-gray-700 mb-2">{!! $title !!}</h1>
    {{-- Page Content --}}
    <x-tables.simple :columnHeaders="$tableColumnHeaders" :columnContents="$categoriesList" routeBtn="categories"
        paramBtn="category" enableShow enableEdit enableDelete />

    {{ $categoriesList->links() }}

</x-main-layout>