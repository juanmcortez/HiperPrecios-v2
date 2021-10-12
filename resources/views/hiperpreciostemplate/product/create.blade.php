<x-main-layout>
    {{-- Default blocks --}}
    <x-slot name="title">{!! $title !!}</x-slot>
    <x-slot name="description">{!! $description !!}</x-slot>
    {{-- Page Title --}}
    <h1 class="py-4 px-6 text-xl font-bold text-gray-700 leading-loose">{!! $title !!}</h1>
    {{-- Page Content --}}
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <x-tables.product_edit :categorySelect="$categories" :unitSelect="$units" />

        <x-tables.rows.savecancel routeName="products" paramName="product" />
    </form>
</x-main-layout>
