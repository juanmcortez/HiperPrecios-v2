<x-main-layout>
    {{-- Default blocks --}}
    <x-slot name="title">{!! $title !!}</x-slot>
    <x-slot name="description">{!! $description !!}</x-slot>
    {{-- Page Title --}}
    <h1 class="px-6 py-4 text-xl font-bold leading-loose text-gray-700">{!! $title !!}</h1>
    {{-- Page Content --}}
    <x-tables.simple :columnHeaders="$tableColumnHeaders" :columnContents="$brandsList" routeBtn="brands"
        paramBtn="brand" enableShow :enableCreate="false" />

    {{ $brandsList->links() }}

</x-main-layout>
