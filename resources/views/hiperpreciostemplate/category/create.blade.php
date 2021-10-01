<x-main-layout>
    {{-- Default blocks --}}
    <x-slot name="title">{!! $title !!}</x-slot>
    <x-slot name="description">{!! $description !!}</x-slot>
    {{-- Page Title --}}
    <h1 class="py-4 px-6 text-xl font-bold text-gray-700 mb-2">{!! $title !!}</h1>
    {{-- Page Content --}}
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        @method('POST')
        <x-tables.simple_edit :columnHeaders="$tableColumnHeaders" routeBtn="categories" paramBtn="category" />

        <x-tables.rows.savecancel routeName="categories" paramName="category" />
    </form>
</x-main-layout>
