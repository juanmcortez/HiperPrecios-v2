<x-main-layout>
    {{-- Default blocks --}}
    <x-slot name="title">{!! $title !!}</x-slot>
    <x-slot name="description">{!! $description !!}</x-slot>
    {{-- Page Title --}}
    <h1 class="py-4 px-6 text-xl font-bold text-gray-700 leading-loose">{!! $title !!}</h1>
    {{-- Page Content --}}
    <form method="POST" action="{{ route('stores.store') }}">
        @csrf
        @method('POST')
        <x-tables.simple_edit :columnHeaders="$tableColumnHeaders" routeBtn="stores" paramBtn="store" />

        <x-tables.rows.savecancel routeName="stores" paramName="store" />
    </form>
</x-main-layout>
