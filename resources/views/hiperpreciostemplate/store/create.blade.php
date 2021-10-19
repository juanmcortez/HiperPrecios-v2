<x-main-layout>
    {{-- Default blocks --}}
    <x-slot name="title">{!! $title !!}</x-slot>
    <x-slot name="description">{!! $description !!}</x-slot>
    {{-- Page Title --}}
    <h1 class="px-6 py-4 text-xl font-bold leading-loose text-gray-700">{!! $title !!}</h1>
    {{-- Page Content --}}
    <form method="POST" action="{{ route('stores.store') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <x-tables.simple_edit :columnHeaders="$tableColumnHeaders" routeBtn="stores" paramBtn="store" />

        <x-tables.rows.savecancel routeName="stores" paramName="store" />
    </form>
</x-main-layout>
