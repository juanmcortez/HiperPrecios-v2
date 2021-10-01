<x-main-layout>
    {{-- Default blocks --}}
    <x-slot name="title">{!! $title !!}</x-slot>
    <x-slot name="description">{!! $description !!}</x-slot>
    {{-- Page Title --}}
    <h1 class="py-4 px-6 text-xl font-bold text-gray-700 mb-2">{!! $title !!}</h1>
    {{-- Page Content --}}
    <form method="POST" action="{{ route('stores.update', ['store' => $store->id]) }}">
        @csrf
        @method('POST')
        <x-tables.simple_edit :columnHeaders="$tableColumnHeaders" :columnContents="$store" routeBtn="stores"
            paramBtn="store" />

        <x-tables.rows.savecancel routeName="stores" paramName="store" itemId="{{ $store->id }}" />
    </form>
</x-main-layout>
